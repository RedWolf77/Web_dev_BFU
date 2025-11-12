<?php

require 'vendor/autoload.php';

use App\ElasticExample;

// Elasticsearch
$elastic = new ElasticExample();

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


