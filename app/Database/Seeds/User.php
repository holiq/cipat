<?php

namespace App\Database\Seeds;

use App\Models\User as ModelsUser;
use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'     => 'Holiq Ibrahim',
                'username' => 'holiq',
                'password' => password_hash('11111111', PASSWORD_DEFAULT),
            ],
            [
                'name'     => 'Johan',
                'username' => 'johan',
                'password' => password_hash('11111111', PASSWORD_DEFAULT),
            ],
            [
                'name'     => 'Agus',
                'username' => 'agus',
                'password' => password_hash('11111111', PASSWORD_DEFAULT),
            ],
        ];

        $user = new ModelsUser();

        foreach ($data as $row) {
            $user->insert($row);
        }
    }
}
