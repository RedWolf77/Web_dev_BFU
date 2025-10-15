<?php
session_start();

$name = htmlspecialchars($_POST['name']);
$quantity = htmlspecialchars($_POST['quantity']);
$dish = htmlspecialchars($_POST['dish']);
$sauce = htmlspecialchars($_POST['sauce']);
$delivery = htmlspecialchars($_POST['delivery']);

$_SESSION['name'] = $name;
$_SESSION['quantity'] = $quantity;
$_SESSION['dish'] = $dish;
$_SESSION['sauce'] = $sauce;
$_SESSION['delivery'] = $delivery;

header("Location: index.php");
exit();
