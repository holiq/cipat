<?php

namespace App\Database\Seeds;

use App\Models\Product as ModelsProduct;
use CodeIgniter\Database\Seeder;

class Product extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'  => 'Baju',
                'stock' => 8,
                'price' => 75000,
            ],
            [
                'name'  => 'Celana',
                'stock' => 2,
                'price' => 90000,
            ],
            [
                'name'  => 'Jaket',
                'stock' => 3,
                'price' => 150000,
            ],
            [
                'name'  => 'Tas Ransel',
                'stock' => 5,
                'price' => 230000,
            ],
        ];

        $product = new ModelsProduct();

        foreach ($data as $row) {
            $product->insert($row);
        }
    }
}
