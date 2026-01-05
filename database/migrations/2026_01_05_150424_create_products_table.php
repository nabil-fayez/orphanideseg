<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('name_ar', 255);
            $table->string('name_en', 255);
            $table->decimal('bottle_size', 8, 2)->comment('سعة الزجاجة باللتر');
            $table->decimal('alcohol_percentage', 5, 2)->comment('نسبة الكحول');
            $table->decimal('price', 10, 2)->comment('السعر بالريال السعودي');
            $table->integer('group_quantity')->comment('عدد القطع في الصندوق');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image_url', 500)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('stock_quantity')->default(0);
            $table->timestamps();

            $table->index('category_id');
            $table->index('brand_id');
            $table->index('is_featured');
            $table->index('is_active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
