<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class GenerateMigrationsAndSeeders extends Command
{
    protected $signature = 'generate:migrations-and-seeders';
    protected $description = 'Generate all migrations and seeders from the database dump with 2 seconds delay between each file';

    public function handle()
    {
        // قائمة بالمigrations المطلوبة
        $migrations = [
            'users',
            'categories',
            'brands',
            'products',
            'addresses',
            'cart_items',
            'favorite_products',
            'orders',
            'order_items',
            'product_reviews',
            'notifications',
        ];

        foreach ($migrations as $migration) {
            $this->info("Creating migration for {$migration}...");
            Artisan::call('make:migration', [
                'name' => "create_{$migration}_table",
                '--create' => $migration,
            ]);
            sleep(2); // انتظار ثانيتين
        }

        // إنشاء seeders
        $seeders = [
            'UsersTableSeeder',
            'CategoriesTableSeeder',
            'BrandsTableSeeder',
            'ProductsTableSeeder',
            'AddressesTableSeeder',
            'CartItemsTableSeeder',
            'FavoriteProductsTableSeeder',
            'OrdersTableSeeder',
            'OrderItemsTableSeeder',
            'ProductReviewsTableSeeder',
            'NotificationsTableSeeder',
        ];

        foreach ($seeders as $seeder) {
            $this->info("Creating seeder {$seeder}...");
            Artisan::call('make:seeder', ['name' => $seeder]);
            sleep(2); // انتظار ثانيتين
        }

        $this->info('All migrations and seeders have been created successfully!');
    }
}
