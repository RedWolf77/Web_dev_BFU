<?php
require 'vendor/autoload.php';
require 'db.php';
require 'Order.php';
require 'QueueManager.php';


class OrderWorker {
    private $order;
    private $queueManager;
    
    public function __construct() {

        $host = 'db';
        $db   = 'lab5_db';
        $user = 'lab5_user';
        $pass = 'lab5_pass';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $pdo = new PDO($dsn, $user, $pass, $options);
        
        $this->order = new Order($pdo);
        
        $this->queueManager = new QueueManager();
    }
    
    public function processMessage($data) {
        echo "📥 Получен новый заказ из очереди: " . json_encode($data) . "\n";
        
        try {
            if (isset($data['action']) && $data['action'] === 'create_order') {
                $orderData = $data['data'];
                $name = $orderData['name'];
                $dish = $orderData['dish'];
                $quantity = $orderData['quantity'];
                $sauce = $orderData['sauce'];
                $delivery_type = $orderData['delivery_type'];
            } else {
                $name = $data['name'];
                $dish = $data['dish'];
                $quantity = $data['quantity'];
                $sauce = $data['sauce'];
                $delivery_type = $data['delivery_type'];
            }
            
            $orderId = $this->order->add($name, $dish, $quantity, $sauce, $delivery_type);
            echo "✅ Заказ сохранен в БД, ID: $orderId\n";
            
            // Логируем успешную обработку
            $logData = [
                'order_id' => $orderId,
                'data' => $data,
                'processed_at' => date('Y-m-d H:i:s')
            ];
            file_put_contents('/var/www/html/processed_orders.log', json_encode($logData) . PHP_EOL, FILE_APPEND);
            
        } catch (Exception $e) {
            echo "❌ Ошибка обработки заказа: " . $e->getMessage() . "\n";
            file_put_contents('/var/www/html/error.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, FILE_APPEND);
        }
    }
    
    public function start() {
        echo "👷 Рабочий запущен (RabbitMQ)...\n";
        
        $this->queueManager->consume(fn($data) => $this->processMessage($data));
    }
}

try {
    $worker = new OrderWorker();
    $worker->start();
} catch (Exception $e) {
    echo "❌ Критическая ошибка: " . $e->getMessage() . "\n";
    file_put_contents('/var/www/html/critical_error.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    exit(1);
}