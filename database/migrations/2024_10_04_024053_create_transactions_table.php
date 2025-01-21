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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); 
            $table->string('code', 15); // Transaction code
            $table->integer('user_id')->nullable(); // User ID
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete(); // Foreign key relation to users table
            $table->integer('member_id')->nullable(); // User ID
            $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete(); // Foreign key relation to users table
            $table->integer('product_id'); // Product ID
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete(); // Foreign key relation to products table
            $table->string('date', 20); // Date of transaction
            $table->string('total_item', 15); // Total items in transaction
            $table->decimal('subtotal', 10, 2); // Subtotal value
            $table->decimal('amount_paid', 15, 2); // Amount paid, default is 0
            $table->string('bank',50)->nullable();
            $table->string('number_card',30)->nullable();
            $table->string('status', 10); // Transaction status (e.g. 'pending', 'compl
    
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
