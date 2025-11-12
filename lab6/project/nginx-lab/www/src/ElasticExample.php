<?php

namespace App;

use App\Helpers\ClientFactory;

class ElasticExample
{
    private $client;
    private $index = 'products';

    public function __construct()
    {
        $this->client = ClientFactory::make('http://localhost:9200/');
        $this->createIndex();
    }

    // создание индекса для товаров
    public function createIndex()
    {
        try {
            $this->client->put($this->index, [
                'json' => [
                    'mappings' => [
                        'properties' => [
                            'name' => ['type' => 'text'],
                            'description' => ['type' => 'text'],
                            'price' => ['type' => 'float'],
                            'category' => ['type' => 'keyword']
                        ]
                    ]
                ]
            ]);
            
            $this->addSampleProducts();
            
        } catch (\Exception $e) {
            
        }
    }

    // добавление тестовых товаров
    private function addSampleProducts()
    {
        $products = [
            [
                'name' => 'Телефон Nokia 3310',
                'description' => 'Легендарный сотовый телефон высокой уровни надежности',
                'price' => 4499.99,
                'category' => 'electronics'
            ],
            [
                'name' => 'Ноутбук MacBook Air M4',
                'description' => 'Мощный современный ноутбук с передовым процессором M4',
                'price' => 99999.99,
                'category' => 'electronics'
            ],
            [
                'name' => 'Футболка хлопковая',
                'description' => 'Удобная футболка из натурального хлопка, стильный цвет хаки',
                'price' => 1999.99,
                'category' => 'clothing'
            ],
            [
                'name' => 'Книга "Программирование на PHP"',
                'description' => 'Учебник по программированию на языке PHP для начинающих',
                'price' => 2499.99,
                'category' => 'books'
            ]
        ];

        foreach ($products as $id => $product) {
            $this->indexDocument($this->index, $id + 1, $product);
        }
    }

    public function indexDocument($index, $id, $data)
    {
        $response = $this->client->put("$index/_doc/$id", [
            'json' => $data
        ]);
        return $response->getBody()->getContents();
    }

    public function search($index, $query)
    {
        $response = $this->client->get("$index/_search", [
            'json' => ['query' => ['match' => $query]]
        ]);
        return $response->getBody()->getContents();
    }
}
