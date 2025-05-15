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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_pesan');
            $table->string('alamat');
            $table->string('metode_pengiriman');
            $table->string('catatan')->nullable();
            $table->enum('status', ['Pending', 'In progress', 'Completed']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
