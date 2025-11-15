<?php
require 'db.php';
require 'Order.php';

$order = new Order($pdo);

$name = htmlspecialchars($_POST['name']);
$dish = htmlspecialchars($_POST['dish']);
$quantity = intval($_POST['quantity']);
$sauce = isset($_POST['sauce']) ? 1 : 0;
$delivery_type = htmlspecialchars($_POST['delivery']);

$order_id = $order->add($name, $dish, $quantity, $sauce, $delivery_type);

header("Location: index.php");
exit();