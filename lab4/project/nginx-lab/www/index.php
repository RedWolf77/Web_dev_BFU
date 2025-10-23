<?php session_start(); ?>

<?php if(isset($_SESSION['errors'])): ?>
    <ul style="color:red;">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<h3>Информация о пользователе:</h3>
<?php foreach ($info as $key => $val): ?>
    <?= htmlspecialchars($key) ?>: <?= htmlspecialchars($val) ?><br>
<?php endforeach; ?>
<hr>

<?php if(isset($_SESSION['name'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['name'] ?></li>
        <li>Количество порций: <?= $_SESSION['quantity'] ?></li>
        <li>Блюдо: <?= $_SESSION['dish'] ?></li>
        <li>Соус: <?= $_SESSION['sauce'] ?></li>
        <li>Тип доставки: <?= $_SESSION['delivery'] ?></li>
    </ul>

    <?php if(isset($_SESSION['api_data'])): ?>
        <h3>Данные из API:</h3>
        <pre><?php print_r($_SESSION['api_data']); ?></pre>
        <?php unset($_SESSION['api_data']); ?>
    <?php endif; ?>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<a href="form.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a>
