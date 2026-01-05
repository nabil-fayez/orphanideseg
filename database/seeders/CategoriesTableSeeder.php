<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name_ar' => 'ويسكي',
                'name_en' => 'Whisky',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 2,
                'name_ar' => 'فودكا',
                'name_en' => 'Vodka',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 3,
                'name_ar' => 'جين',
                'name_en' => 'Gin',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 4,
                'name_ar' => 'روم',
                'name_en' => 'Rum',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 5,
                'name_ar' => 'بيرة',
                'name_en' => 'Beer',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 6,
                'name_ar' => 'نبيذ',
                'name_en' => 'Wine',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 7,
                'name_ar' => 'شامبانيا',
                'name_en' => 'Champagne',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
            [
                'id' => 8,
                'name_ar' => 'كونياك',
                'name_en' => 'Cognac',
                'image_url' => null,
                'is_active' => 1,
                'created_at' => '2025-11-01 18:11:59',
                'updated_at' => '2025-11-01 18:11:59',
            ],
        ]);
    }
}
