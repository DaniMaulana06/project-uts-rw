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
        Schema::create('bunga', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('jenis');
            $table->enum('kategori', ['bucket1', 'bucket_makanan']);
            $table->string('nama');
            $table->double('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bunga');
    }
};
