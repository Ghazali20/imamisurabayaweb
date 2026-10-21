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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul kegiatan
            $table->string('image'); // Path foto kegiatan di storage
            $table->text('description')->nullable(); // Deskripsi / Keterangan singkat
            $table->date('event_date')->nullable(); // Tanggal pelaksanaan kegiatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};