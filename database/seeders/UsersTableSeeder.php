<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $password = '$2y$12$9MI9v6wHrUvo/qr16qQXIe3muyJy5570M0cBsr0FMNqtfPNTahEyu';

        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'Nabil',
                'last_name' => 'Fayez',
                'date_of_birth' => '2000-04-10',
                'gender' => 'male',
                'email' => 'nabilfayez59@gmail.com',
                'phone' => '201206986350',
                'password' => $password,
                'status' => 'active',
                'email_verified_at' => '2025-11-01 18:57:42',
                'verification_code' => '111111',
                'created_at' => '2025-11-01 18:58:34',
                'updated_at' => '2025-11-01 21:11:10',
            ],
            [
                'id' => 2,
                'first_name' => 'nabil',
                'last_name' => 'fayez',
                'date_of_birth' => '2004-11-01',
                'gender' => null,
                'email' => 'nabil@mail.com',
                'phone' => '06986355',
                'password' => $password,
                'status' => 'active',
                'email_verified_at' => null,
                'verification_code' => null,
                'created_at' => '2025-11-01 19:26:31',
                'updated_at' => '2025-11-01 19:26:31',
            ],
            [
                'id' => 3,
                'first_name' => 'nabil2',
                'last_name' => 'fayez',
                'date_of_birth' => '2000-11-15',
                'gender' => null,
                'email' => 'nabilfayez2000@mail.com',
                'phone' => '12345678901',
                'password' => $password,
                'status' => 'active',
                'email_verified_at' => null,
                'verification_code' => null,
                'created_at' => '2025-11-01 20:39:59',
                'updated_at' => '2025-11-01 20:39:59',
            ],
        ]);
    }
}
