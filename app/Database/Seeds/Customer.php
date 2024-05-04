<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Customer extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'    => 'Bayu',
                'phone'   => '0888888929',
                'address' => 'Balaraja',
            ],
            [
                'name'    => 'Wahyu',
                'phone'   => '08223339393',
                'address' => 'Jakarta',
            ],
            [
                'name'    => 'Yahya',
                'phone'   => '08111293484',
                'address' => 'Serang',
            ],
        ];

        foreach ($data as $row) {
            $this->db->table('customers')->insert($row);
        }
    }
}
