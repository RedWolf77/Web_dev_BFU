<?php
require 'vendor/autoload.php';
require 'db.php';
require 'Order.php';
require 'QueueManager.php';

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

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $order = new Order($pdo);
    $queueManager = new QueueManager();

    echo "👷 Рабочий запущен (RabbitMQ)...\n";

    $queueManager->consume(function($data) {
        echo "📥 Получено сообщение: " . json_encode($data) . "\n";

        try {
            $orderData = $data['data'];
            $orderId = $order->add(
                $orderData['name'],
                $orderData['dish'],
                $orderData['quantity'],
                $orderData['sauce'],
                $orderData['delivery_type']
            );
            
            $logData = [
                'action' => 'order_created',
                'order_id' => $orderId,
                'data' => $orderData,
                'processed_at' => date('Y-m-d H:i:s')
            ];

            file_put_contents('processed_orders.log', json_encode($logData) . PHP_EOL, FILE_APPEND);
            
            echo "✅ Заказ сохранен в БД, ID: $orderId\n";
            
            sleep(1);

        }   catch (Exception $e) {
            error_log("Ошибка обработки заказа: " . $e->getMessage());
            echo "❌ Ошибка: " . $e->getMessage() . "\n";
        }
    });
} catch (Exception $e) {
    echo "❌ Критическая ошибка: " . $e->getMessage() . "\n";
    exit(1);
}
