<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $this->call('User');
        $this->call('Dosen');
        $this->call('Product');
        $this->call('Customer');
    }
}
