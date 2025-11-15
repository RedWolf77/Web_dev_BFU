<?php
require 'vendor/autoload.php';
require 'db.php';
require 'Order.php';
require 'QueueManager.php';

$order = new Order($pdo);

try {
    $name = htmlspecialchars($_POST['name']);
    $dish = htmlspecialchars($_POST['dish']);
    $quantity = intval($_POST['quantity']);
    $sauce = isset($_POST['sauce']) ? 1 : 0;
    $delivery_type = htmlspecialchars($_POST['delivery']);

    $orderData = [
        'action' => 'create_order',
        'data' => [
            'name' => $name,
            'dish' => $dish,
            'quantity' => $quantity,
            'sauce' => $sauce,
            'delivery_type' => $delivery_type,
            'timestamp' => date('Y-m-d H:i:s')
        ]
    ];

    $queueManager = new QueueManager();
    $queueManager->publish($orderData);

    session_start();
    $_SESSION['order_status'] = 'processing';
    $_SESSION['order_data'] = $orderData['data'];
    
} catch (Exception $e) {
    error_log("Ошибка при обработке заказа: " . $e->getMessage());
    session_start();
    $_SESSION['order_status'] = 'error';
}



// $order_id = $order->add($name, $dish, $quantity, $sauce, $delivery_type);

header("Location: index.php");
exit();