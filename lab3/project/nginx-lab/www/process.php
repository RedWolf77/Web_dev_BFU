<?php
session_start();

$name = htmlspecialchars($_POST['name']);
$quantity = htmlspecialchars($_POST['quantity']);
$dish = htmlspecialchars($_POST['dish']);

if (isset($_POST['sauce']) && $_POST['sauce'] === 'yes') {
    $sauce = "с соусом";
} else {
    $sauce = "без соуса";
}

$delivery = isset($_POST['delivery']) ? $_POST['delivery'] : '';

$_SESSION['name'] = $name;
$_SESSION['quantity'] = $quantity;
$_SESSION['dish'] = $dish;
$_SESSION['sauce'] = $sauce;
$_SESSION['delivery'] = $delivery;

$errors = [];
if(empty($name)) $errors[] = "Имя не может быть пустым";
if(empty($dish)) $errors[] = "Блюдо не может быть пустым";
if ($quantity < 1) $errors[] = "Количество порций должно быть больше одной.";

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

$line = $name . ";" . $quantity . ";" . $dish . ";" . $sauce . ";" . $delivery . "\n";
file_put_contents("data.txt", $line, FILE_APPEND);

header("Location: index.php");
exit();
