<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Portfolio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_portfolio' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'nama_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'id_client' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'judul_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'slug_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'gambar_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'isi_portfolio' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'website_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'status_portfolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
             'date_created datetime default current_timestamp on update current_timestamp',
            'testimoni' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'last_modified' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'date_project' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_portfolio', true);
        $this->forge->createTable('tb_portfolio');
    }

    public function down()
    {
        $this->forge->dropTable('tb_portfolio');
    }
}
