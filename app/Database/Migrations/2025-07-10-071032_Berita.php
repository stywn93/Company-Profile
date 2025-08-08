<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_kategori' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'slug_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'judul_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'isi_berita' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'status_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'jenis_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'keywords' => [
                'type' => 'TEXT',
                'null' => false,
            ],
             'date_cretated datetime default current_timestamp on update current_timestamp',
            'last_modified' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('tb_berita');
    }

    public function down()
    {
        $this->forge->dropTable('tb_berita');
    }
}
