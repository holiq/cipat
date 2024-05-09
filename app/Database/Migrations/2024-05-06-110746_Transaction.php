<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_transaction' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'customer_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'transaction_date' => [
                'type' => 'DATETIME',
            ],
            'sub_total' => [
                'type' => 'FLOAT',
            ],
            'discount' => [
                'type' => 'FLOAT',
            ],
            'tax' => [
                'type' => 'FLOAT',
            ],
            'total' => [
                'type' => 'FLOAT',
            ],
            'pay' => [
                'type' => 'FLOAT',
            ],
            'change' => [
                'type' => 'FLOAT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id', 'customers', 'id');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
