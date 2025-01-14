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
        Schema::create('Transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code',15);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable(); //
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); //
            $table->string('date',20);
            $table->string('total_item',15);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('amount_paid', 10, 2);
            $table->string('bank',50)->nullable(); 
            $table->string('number_card',30)->nullable(); 
            $table->string('status',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
