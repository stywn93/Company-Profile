<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Client extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_client' => 3,
                'jenis_client' => '6',
                'nama_client' => 'Grab',
                'alamat' => 'ini alamat grab',
                'no_telepon' => '021020202',
                'email_client' => 'grab@jek.com',
                'website' => 'www.grab.com',
                'gambar_client' => '1200px-Grab_Logo_svg.png',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:25:54',
                'last_modified' => '2021-05-01',
            ],
            [
                'id_client' => 4,
                'jenis_client' => '6',
                'nama_client' => 'Gojek',
                'alamat' => 'ini alamat gojek',
                'no_telepon' => '021121212',
                'email_client' => 'gojek@jek.com',
                'website' => 'www.gojek.com',
                'gambar_client' => 'hitobajlkseeivcjy22b.png',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:27:20',
                'last_modified' => '0000-00-00',
            ],
            [
                'id_client' => 5,
                'jenis_client' => '1',
                'nama_client' => 'Link Aja',
                'alamat' => 'ini alamat link aja',
                'no_telepon' => '02121212129',
                'email_client' => 'link@aja.com',
                'website' => 'www.linkaja.com',
                'gambar_client' => '1200px-LinkAja_svg.png',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:48:24',
                'last_modified' => '0000-00-00',
            ],
            [
                'id_client' => 6,
                'jenis_client' => '1',
                'nama_client' => 'Traveloka',
                'alamat' => 'ini alamat traveloka',
                'no_telepon' => '02121212129',
                'email_client' => 'travel@ok.com',
                'website' => 'www.traveloka.com',
                'gambar_client' => 'Traveloka_Primary_Logo.png',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:50:09',
                'last_modified' => '2021-05-01',
            ],
            [
                'id_client' => 7,
                'jenis_client' => '5',
                'nama_client' => 'Tokopedia',
                'alamat' => 'ini alamat tokopakedi',
                'no_telepon' => '02121212129',
                'email_client' => 'toko@pedia.com',
                'website' => 'www.tokopedia.com',
                'gambar_client' => '1575050504675-logo-tokopedia.jpg',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:51:04',
                'last_modified' => '0000-00-00',
            ],
            [
                'id_client' => 8,
                'jenis_client' => '5',
                'nama_client' => 'Dana',
                'alamat' => 'ini alamat dana',
                'no_telepon' => '02121212129',
                'email_client' => 'da@na.com',
                'website' => 'www.dana.com',
                'gambar_client' => '_bjmYta5_400x400.jpg',
                'publish' => 'Publish',
                'date_created' => '2021-05-01 11:52:08',
                'last_modified' => '0000-00-00',
            ],
            [
                'id_client' => 10,
                'jenis_client' => '1',
                'nama_client' => 'Dinas Kesehatan Kabupaten Situbondo',
                'alamat' => 'Situbondo',
                'no_telepon' => '012345',
                'email_client' => 'dinkes@situbondokab.go.id',
                'website' => 'dinkes.situbondokab.go.id',
                'gambar_client' => '1752113546_b879d763e71b64fb93f8.png',
                'publish' => 'Publish',
                'date_created' => '2025-07-10 10:13:40',
                'last_modified' => '2025-07-10',
            ],
        ];
        $this->db->table('tb_client')->insertBatch($data);
    }
}
