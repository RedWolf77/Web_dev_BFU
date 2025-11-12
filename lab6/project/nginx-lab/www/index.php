<?php

require 'vendor/autoload.php';

use App\RedisExample;
use App\ElasticExample;
use App\ClickhouseExample;

// Elasticsearch
$elastic = new ElasticExample();
echo $elastic->indexDocument('books', 1, ['title' => '1984', 'author' => 'Orwell']);
echo $elastic->search('books', ['author' => 'Orwell']);
