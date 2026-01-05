<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' => 8,
                'order_number' => null,
                'user_id' => 2,
                'address_id' => 1,
                'pickup_time' => '15:01:00',
                'pickup_date' => '2025-11-05',
                'notes' => null,
                'delivery_cost' => '0.00',
                'discount' => '0.00',
                'subtotal' => '300.00',
                'total_amount' => '300.00',
                'status' => 'cancelled',
                'payment_status' => 'pending',
                'payment_method' => 'cash',
                'created_at' => '2025-11-05 13:01:00',
                'updated_at' => '2025-11-10 19:12:50',
            ],
            [
                'id' => 9,
                'order_number' => null,
                'user_id' => 2,
                'address_id' => 1,
                'pickup_time' => '15:01:08',
                'pickup_date' => '2025-11-05',
                'notes' => null,
                'delivery_cost' => '0.00',
                'discount' => '0.00',
                'subtotal' => '300.00',
                'total_amount' => '300.00',
                'status' => 'cancelled',
                'payment_status' => 'pending',
                'payment_method' => 'cash',
                'created_at' => '2025-11-05 13:01:08',
                'updated_at' => '2025-11-10 19:20:43',
            ],
        ]);
    }
}