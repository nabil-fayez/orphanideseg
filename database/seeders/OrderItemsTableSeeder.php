<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'id' => 10,
                'order_id' => 8,
                'product_id' => 2,
                'quantity' => 1,
                'price' => '120.00',
                'temperature' => 'cold',
                'updated_at' => '2025-11-05 13:01:00',
                'created_at' => '2025-11-05 13:01:00',
            ],
            [
                'id' => 11,
                'order_id' => 9,
                'product_id' => 1,
                'quantity' => 1,
                'price' => '95.00',
                'temperature' => 'cold',
                'updated_at' => '2025-11-05 13:01:00',
                'created_at' => '2025-11-05 13:01:00',
            ],
            // ... (أضف باقي البيانات كما هي في SQL dump)
        ]);
    }
}