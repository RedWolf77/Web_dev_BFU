<?php session_start(); ?>

<?php if(isset($_SESSION['name'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['name'] ?></li>
        <li>Количество порций: <?= $_SESSION['quantity'] ?></li>
        <li>Блюдо: <?= $_SESSION['dish'] ?></li>
        <li>Соус: <?= $_SESSION['sauce'] ?></li>
        <li>Тип доставки: <?= $_SESSION['delivery'] ?></li>
    </ul>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<a href="form.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a>
