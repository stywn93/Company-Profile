<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriClient extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
             'date_created datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('tb_kategori_client');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kategori_client');
    }
}
