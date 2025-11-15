<?php
require 'db.php';
require 'Order.php';

session_start();
if (isset($_SESSION['order_status'])) {
    if ($_SESSION['order_status'] === 'processing') {
        echo '<div style="background: #e3f2fd; padding: 10px; margin: 10px 0; border-radius: 5px;">';
        echo '✅ Ваш заказ принят в обработку и скоро будет выполнен!';
        echo '</div>';
    } elseif ($_SESSION['order_status'] === 'error') {
        echo '<div style="background: #ffebee; padding: 10px; margin: 10px 0; border-radius: 5px;">';
        echo '❌ Произошла ошибка при обработке заказа';
        echo '</div>';
    }
    unset($_SESSION['order_status']);
}

$order = new Order($pdo);
$all = $order->getAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заказы</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #fafafa; }
        .order-list { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .order-item { padding: 10px; border-bottom: 1px solid #eee; }
        .btn { display: inline-block; padding: 10px 15px; background: #0078ff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

<h2>Все заказы:</h2>

<div class="order-list">
<?php if (empty($all)): ?>
    <p>Заказов пока нет.</p>
<?php else: ?>
    <?php foreach($all as $row): ?>
        <div class="order-item">
            <strong><?= htmlspecialchars($row['name']) ?></strong><br>
            Блюдо: <?= htmlspecialchars($row['dish']) ?>, 
            Количество: <?= $row['quantity'] ?>, 
            Соус: <?= $row['sauce'] ? 'Да' : 'Нет' ?>, 
            Доставка: <?= htmlspecialchars($row['delivery_type']) ?><br>
            <small>Создан: <?= $row['created_at'] ?></small>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<br>
<a href="form.html" class="btn">➕ Сделать новый заказ</a>

</body>
</html>