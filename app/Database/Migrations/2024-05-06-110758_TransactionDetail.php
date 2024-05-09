<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionDetail extends Migration
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
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'transaction_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'qty' => [
                'type' => 'FLOAT',
            ],
            'price' => [
                'type' => 'FLOAT',
            ],
            'amount' => [
                'type' => 'FLOAT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id');
        $this->forge->createTable('transactiondetails');
    }

    public function down()
    {
        $this->forge->dropTable('transactiondetails');
    }
}
