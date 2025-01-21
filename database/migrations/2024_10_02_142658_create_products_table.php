<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(); // Ubah id menjadi integer
            $table->integer('category_id'); // Ubah category_id menjadi integer
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete(); // Relasi dengan categories
            $table->string('code', 16)->unique();
            $table->string('name', 60);
            $table->string('brand', 30);
            $table->string('stock', 5);
            $table->string('price_buy', 15);
            $table->string('price_sell', 15);
            $table->string('unit', 10);
            $table->string('weight', 10)->nullable();
            $table->string('price_kg', 10)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
