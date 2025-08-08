<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserToken extends Seeder
{
    public function run()
    {
        $data = [
            [ 'id' => 6, 'email' => 'fajaras465@gmail.coms', 'token' => 'oybxZE/AEMiwi63Z21tqKTiJ90y6x44fN703gz7vagg=', 'date_created' => 1619930188 ],
            [ 'id' => 7, 'email' => 'fajaras465@gmail.com', 'token' => 'HO7/WQkcsS7G0TvCNvGnkF33JXF1VjHHQVuqAVFjv6Q=', 'date_created' => 1619930486 ],
            [ 'id' => 8, 'email' => 'kantor.iwan01@gmail.com', 'token' => 'RBc4WIFYd+nB3TJGPS453stSwBI6oUhkLsewvihcJV4=', 'date_created' => 1751255825 ],
        ];

        $this->db->table('tb_user_token')->insertBatch($data);
    }
}
