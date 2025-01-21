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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 30);
            $table->string('code', 8);
            $table->string('email', 50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->boolean('isAdmin');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
