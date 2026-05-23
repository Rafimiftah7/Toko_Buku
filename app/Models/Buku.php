<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    /**
     * The table associated with the model.
     * Tabel utama CRUD: buku
     */
    protected $table = 'buku';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'judul',
        'penulis',
        'kategori_id',
        'deskripsi',
        'harga',
        'penerbit',
        'tahun_terbit',
        'stok',
        'cover_color',
        'cover_image',
        'is_bestseller',
        'is_new',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'harga'        => 'decimal:2',
        'stok'         => 'integer',
        'tahun_terbit' => 'integer',
        'is_bestseller' => 'boolean',
        'is_new'        => 'boolean',
    ];

    /**
     * Relasi: Buku belongsTo Kategori (relasi foreign key)
     * Eloquent ORM — Relasi Tabel
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
