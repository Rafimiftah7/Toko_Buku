<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    /**
     * The table associated with the model.
     * Tabel relasi utama: kategori_buku
     */
    protected $table = 'kategori_buku';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_kategori',
        'slug',
        'icon',
        'deskripsi',
    ];

    /**
     * Relasi: Satu kategori memiliki banyak buku (hasMany)
     * Eloquent ORM — Relasi Tabel
     */
    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }

    /**
     * Auto-generate slug dari nama_kategori
     */
    public static function generateSlug(string $nama): string
    {
        return strtolower(preg_replace('/[^a-z0-9]+/i', '-', $nama));
    }
}
