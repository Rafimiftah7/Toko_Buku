<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel 2: buku — tabel utama CRUD dengan relasi ke kategori_buku
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->foreignId('kategori_id')
                  ->constrained('kategori_buku')
                  ->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->string('penerbit')->default('Penerbit Umum');
            $table->integer('tahun_terbit')->nullable();
            $table->integer('stok')->default(0);
            $table->string('cover_color')->default('linear-gradient(135deg, #f43f5e 0%, #fb923c 100%)');
            $table->string('cover_image', 500)->nullable();
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_new')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
