<?php

namespace App\Database\Seeds;

use App\Models\Dosen as ModelsDosen;
use CodeIgniter\Database\Seeder;

class Dosen extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_dosen'   => '001',
                'nama_dosen'   => 'Agus S.Kom',
                'status_dosen' => true,
            ],
            [
                'kode_dosen'   => '002',
                'nama_dosen'   => 'Wahyu M.Kom',
                'status_dosen' => true,
            ],
            [
                'kode_dosen'   => '003',
                'nama_dosen'   => 'Zia S.H',
                'status_dosen' => false,
            ],
            [
                'kode_dosen'   => '004',
                'nama_dosen'   => 'Cahyo M.M',
                'status_dosen' => true,
            ],
            [
                'kode_dosen'   => '005',
                'nama_dosen'   => 'Bayu S.Pd.I',
                'status_dosen' => false,
            ],
        ];

        $dosen = new ModelsDosen();

        foreach ($data as $row) {
            $dosen->insert($row);
        }
    }
}
