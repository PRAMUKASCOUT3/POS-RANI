<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->integer('id')->autoIncrement(); // Ubah id menjadi integer
            $table->string('name',100); // Nama anggota
            $table->string('code',10); // Email anggota
            $table->string('phone',15); // Nomor telepon
            $table->integer('points')->default(0)->nullable(); // Poin awal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
