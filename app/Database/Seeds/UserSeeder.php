<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'username' => 'Chong Chun Rock',
            'password' => password_hash('abc123', PASSWORD_DEFAULT),
            'email'    => 'chong.chunrock@test.com',
        ];

        $this->db->table('users')->insert($data);
    }
}
