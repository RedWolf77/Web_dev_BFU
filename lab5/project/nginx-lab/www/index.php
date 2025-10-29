<?php
require 'db.php';
require 'Order.php';

$order = new Order($pdo);
$all = $order->getAll();
?>
<h2>Все заказы:</h2>
<ul>
<?php foreach($all as $row): ?>
    <li>
        <?= $row['name'] ?>, 
        Блюдо: <?= $row['dish'] ?>, 
        Количество: <?= $row['quantity'] ?>, 
        Соус: <?= $row['sauce'] ? 'Да' : 'Нет' ?>, 
        Доставка: <?= $row['delivery_type'] ?>
    </li>
<?php endforeach; ?>
</ul>

<a href="form.html">Сделать новый заказ</a>