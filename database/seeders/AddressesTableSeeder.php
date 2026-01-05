<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'building_number' => '1',
                'apartment_number' => '2',
                'street_name' => '22',
                'neighborhood' => '222',
                'city' => '22',
                'floor' => '22',
                'notes' => 'ddd',
                'is_default' => 0,
                'created_at' => '2025-11-05 05:54:54',
                'updated_at' => '2025-11-05 07:42:21',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'building_number' => '6',
                'apartment_number' => '6',
                'street_name' => '6',
                'neighborhood' => '6',
                'city' => '6',
                'floor' => '6',
                'notes' => '6',
                'is_default' => 1,
                'created_at' => '2025-11-05 07:05:39',
                'updated_at' => '2025-11-05 07:42:21',
            ]
        ]);
    }
}
