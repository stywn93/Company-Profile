<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Layanan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_layanan'      => 4,
                'id_user'         => 8,
                'slug_layanan'    => 'web-design',
                'judul_layanan'   => 'Web Design',
                'isi_layanan'     => "<div>\r\n<div>Lorem&nbsp;Deserunt.</div>\r\n</div>",
                'gambar_layanan'  => 'web-design.png',
                'status_layanan'  => 'Publish',
                'date_created'   => '2021-05-01 12:57:10',
                'last_modified'   => '2021-05-01 00:00:00',
            ],
            [
                'id_layanan'      => 5,
                'id_user'         => 8,
                'slug_layanan'    => 'marketing',
                'judul_layanan'   => 'Marketing',
                'isi_layanan'     => "<div>\r\n<div>Lorem&nbsp;similique.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>",
                'gambar_layanan'  => 'bullhorn.png',
                'status_layanan'  => 'Publish',
                'date_created'   => '2021-05-01 12:57:22',
                'last_modified'   => '2021-05-01 00:00:00',
            ],
            [
                'id_layanan'      => 6,
                'id_user'         => 8,
                'slug_layanan'    => 'graphic-design',
                'judul_layanan'   => 'Graphic Design',
                'isi_layanan'     => "<div>\r\n<div>Lorem&nbsp;;similique.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>",
                'gambar_layanan'  => 'ux.png',
                'status_layanan'  => 'Publish',
                'date_created'   => '2021-05-01 12:55:36',
                'last_modified'   => '2021-05-01 00:00:00',
            ],
            [
                'id_layanan'      => 7,
                'id_user'         => 8,
                'slug_layanan'    => 'app-development',
                'judul_layanan'   => ' App Development',
                'isi_layanan'     => "<p>Isi Layanan&nbsp;</p>\r\n<div>\r\n<div>Lorem&nbsp;Alias.</div>\r\n</div>",
                'gambar_layanan'  => 'video-game.png',
                'status_layanan'  => 'Publish',
                'date_created'   => '2021-05-01 12:51:13',
                'last_modified'   => '2021-05-01 00:00:00',
            ],
            [
                'id_layanan'      => 9,
                'id_user'         => 11,
                'slug_layanan'    => 'data-science',
                'judul_layanan'   => 'Data Science',
                'isi_layanan'     => '<p>asd</p>',
                'gambar_layanan'  => '1752120431_01aaaed3e20e4d0be7cc.png',
                'status_layanan'  => 'Publish',
                'date_created'   => '2025-07-10 11:07:23',
                'last_modified'   => '2025-07-10 00:00:00',
            ],
        ];

        // Insert data
        $this->db->table('tb_layanan')->insertBatch($data);
    }
}
