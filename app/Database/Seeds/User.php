<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [ 'id_user' => 1, 'id_kategori' => 0, 'nama' => 'Erdin Gari', 'email' => 'erdin@erdin.com', 'image' => 'default.png', 'password' => '$2y$10$Tk0flcHcLKBlB6KQI/0VKeH4yqVPo8sUa3XI8KEzKHczO1NU8uVqq', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619931701 ],
            [ 'id_user' => 4, 'id_kategori' => 0, 'nama' => 'Saya User', 'email' => 'user@user.com', 'image' => 'default.png', 'password' => '$2y$10$rwY.D1.VDefruq.BMOsMSe6HpW1apz9J4bC0hcNdM5qNt9SLBrhGi', 'role_id' => 2, 'is_active' => 1, 'date_created' => 1619931428 ],
            [ 'id_user' => 5, 'id_kategori' => 0, 'nama' => 'Welly Pangestu Setiawan', 'email' => 'welly@welly.com', 'image' => 'default.png', 'password' => '$2y$10$wNCv5W/p7igiRqu4Hcg69OWyP4U4M7RAFtsVgn3hv3djqwF54x7BK', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619931536 ],
            [ 'id_user' => 6, 'id_kategori' => 0, 'nama' => 'Dimas Pramudya Pangestu', 'email' => 'dimas@dimas.com', 'image' => 'default.png', 'password' => '$2y$10$RRH7NsYq/sccROqrK2FB.eEqKzJI45S.3E.hH54T8idRYX9yWpACq', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619931584 ],
            [ 'id_user' => 7, 'id_kategori' => 0, 'nama' => 'Gibaran Hamas Annidal', 'email' => 'gibran@gibran.com', 'image' => 'default.png', 'password' => '$2y$10$Qf7QF.MKGKMAQK60XlspaOxWSjcZ02to00FwAWo3PULaMZH/mdVom', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619931618 ],
            [ 'id_user' => 8, 'id_kategori' => 0, 'nama' => 'Fajar Adi Setyawan', 'email' => 'fajaras465@gmail.com', 'image' => 'default.png', 'password' => '$2y$10$w3rY5muFCdEwq/07TEAjkObNJQIuUoD.ijnfzitVzbeszXsZfKBDK', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619930486 ],
            [ 'id_user' => 9, 'id_kategori' => 0, 'nama' => 'Pramah Eli Hia', 'email' => 'pramah@pramah.com', 'image' => 'default.png', 'password' => '$2y$10$QcR3ZC1W.cahpg.1XCsiruPngbwTNTcPk9UimisWRe4sNA3BoBDd6', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1619931734 ],
            [ 'id_user' => 11, 'id_kategori' => 0, 'nama' => 'Iwan Bagus Setyawan P', 'email' => 'kantor.iwan01@gmail.com', 'image' => '1752109765_6be5263fbe1dbf784306.jpg', 'password' => '$2y$10$Zkb3zocru2g9gH6UmNvJHuH89ZgKXquve3rl0xZI4Wido5zgbc1yW', 'role_id' => 1, 'is_active' => 1, 'date_created' => 1751255825 ],
        ];

        $this->db->table('tb_user')->insertBatch($data);
    }
}
