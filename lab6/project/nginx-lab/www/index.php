<?php

require 'vendor/autoload.php';

use App\ElasticExample;

// Elasticsearch
$elastic = new ElasticExample();

$results = [];

if ($_POST['search'] ?? false) {
    $query = $_POST['query'] ?? '';
    if (!empty($query)) {
        $results = $elastic->searchProducts($query);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Поиск товаров</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .search-form { margin-bottom: 30px; }
        .search-input { padding: 10px; width: 300px; }
        .search-btn { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .product { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px; }
        .product-title { font-weight: bold; margin-bottom: 5px; }
        .product-price { color: #28a745; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Поиск товаров</h1>
    
    <form method="POST" class="search-form">
        <input type="text" name="query" class="search-input" 
               placeholder="Введите описание товара..." 
               value="<?= htmlspecialchars($_POST['query'] ?? '') ?>">
        <button type="submit" name="search" class="search-btn">Найти</button>
    </form>

    <?php if ($_POST['search'] ?? false): ?>
        <h2>Результаты поиска:</h2>
        <?php if (empty($results)): ?>
            <p>Товары не найдены</p>
        <?php else: ?>
            <pre><?php print_r($results); ?></pre>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

