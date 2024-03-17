<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_dosen' => [
                    'type'         => 'INT',
                    'unsigned'     => true,
                    'autoincrment' => 'true',
                ],
            ],
            [
                'kode_dosen' => [
                    'type'      => 'VARCHAR',
                    'constrait' => 20,
                ],
            ],
            [
                'nama_dosen' => [
                    'type'      => 'VARCHAR',
                    'constrait' => 30,
                ],
            ],
            [
                'status_dosen' => [
                    'type'      => 'CHAR',
                    'constrait' => 1,
                ],
            ]
        );
        $this->forge->addKey('id_dosen', true);
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        $this->forge->dropTable('dosen');
    }
}
