<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setting extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_setting' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'no_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'profile' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'visi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'misi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'sejarah' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_setting', true);
        $this->forge->createTable('tb_setting');
    }

    public function down()
    {
        $this->forge->dropTable('tb_setting');
    }
}
