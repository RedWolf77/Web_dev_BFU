<?php

require 'vendor/autoload.php';

use App\ElasticExample;

// Elasticsearch
$elastic = new ElasticExample();

$results = [];
$searchQuery = '';
$searchPerformed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['query'] ?? '';
    
    if (!empty($searchQuery)) {
        $results = $elastic->searchProducts($searchQuery);
        $searchPerformed = true;
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
    <h1>Поиск товаров</h1>
    
    <form method="POST" class="search-form">
        <input type="text" name="query" class="search-input" 
               placeholder="Введите описание товара..." 
               value="<?= htmlspecialchars($searchQuery) ?>">
        <button type="submit" class="search-btn">Найти</button>
    </form>

    <?php if ($searchPerformed): ?>
        <h2>Результаты поиска для "<?= htmlspecialchars($searchQuery) ?>":</h2>
        
        <?php if (isset($results['error'])): ?>
            <p class="no-results">Ошибка: <?= $results['error'] ?></p>
        <?php elseif (empty($results)): ?>
            <p class="no-results">Товары не найдены</p>
        <?php else: ?>
            <p class="results-count">Найдено товаров: <?= count($results) ?></p>
            <?php foreach ($results as $product): ?>
                <div class="product">
                    <div class="product-title"><?= htmlspecialchars($product['name']) ?></div>
                    <div class="product-description"><?= htmlspecialchars($product['description']) ?></div>
                    <div class="product-price">💰 <?= number_format($product['price'], 2, '.', ' ') ?> руб.</div>
                    <span class="product-category"><?= htmlspecialchars($product['category']) ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

