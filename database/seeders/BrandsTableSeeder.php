<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            [
                'id' => 1,
                'name_ar' => 'جوني ووكر',
                'name_en' => 'Johnnie Walker',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 2,
                'name_ar' => 'جاك دانيالز',
                'name_en' => 'Jack Daniels',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 3,
                'name_ar' => 'جيمسون',
                'name_en' => 'Jameson',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 4,
                'name_ar' => 'شيفاس ريجال',
                'name_en' => 'Chivas Regal',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 5,
                'name_ar' => 'أبسولوت',
                'name_en' => 'Absolut',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 6,
                'name_ar' => 'سميرنوف',
                'name_en' => 'Smirnoff',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 7,
                'name_ar' => 'جوردون',
                'name_en' => 'Gordon\'s',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 8,
                'name_ar' => 'باكاردي',
                'name_en' => 'Bacardi',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 9,
                'name_ar' => 'هاينكن',
                'name_en' => 'Heineken',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 10,
                'name_ar' => 'كورونا',
                'name_en' => 'Corona',
                'logo_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
        ]);
    }
}
