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
