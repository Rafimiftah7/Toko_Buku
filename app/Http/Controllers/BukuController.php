<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * BukuController — Resource Controller untuk CRUD Data Buku
 * Menggunakan Eloquent ORM dan Relasi ke Kategori
 */
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     * Storefront: tampilkan semua buku dengan filter kategori & pencarian
     */
    public function index(Request $request)
    {
        $kategoriList = Kategori::all();

        $query = Buku::with('kategori');

        // Filter pencarian judul/penulis
        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'like', "%{$cari}%")
                  ->orWhere('penulis', 'like', "%{$cari}%");
            });
        }

        // Filter kategori berdasarkan slug
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $slug = $request->kategori;
            $cat = Kategori::where('slug', $slug)->first();
            if ($cat) {
                $query->where('kategori_id', $cat->id);
            }
        }

        $buku = $query->latest()->get();

        return view('buku.index', compact('buku', 'kategoriList'));
    }

    /**
     * Show the form for creating a new resource. (Admin Only)
     */
    public function create()
    {
        $this->authorizeAdmin();
        $kategoriList = Kategori::all();
        return view('buku.create', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage. (Admin Only)
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $messages = [
            'cover_image.max' => 'URL gambar terlalu panjang! Pastikan Anda menyalin "Image Address" (Alamat Gambar), bukan menyalin URL halaman pencarian Google.',
            'cover_image.url' => 'Format URL gambar tidak valid.',
        ];

        $validated = $request->validate([
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategori_buku,id',
            'deskripsi'     => 'nullable|string',
            'harga'         => 'required|numeric|min:0',
            'penerbit'      => 'nullable|string|max:255',
            'tahun_terbit'  => 'nullable|integer|min:1900|max:2030',
            'stok'          => 'required|integer|min:0',
            'cover_color'   => 'nullable|string',
            'cover_image'   => 'nullable|string|max:500',
            'is_bestseller' => 'boolean',
            'is_new'        => 'boolean',
        ], $messages);

        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['is_new']        = $request->boolean('is_new');

        Buku::create($validated);

        return redirect()->back()
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $buku->load('kategori');
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource. (Admin Only)
     */
    public function edit(Buku $buku)
    {
        $this->authorizeAdmin();
        $kategoriList = Kategori::all();
        return view('buku.edit', compact('buku', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage. (Admin Only)
     */
    public function update(Request $request, Buku $buku)
    {
        $this->authorizeAdmin();

        $messages = [
            'cover_image.max' => 'URL gambar terlalu panjang! Pastikan Anda menyalin "Image Address" (Alamat Gambar), bukan menyalin URL halaman pencarian Google.',
            'cover_image.url' => 'Format URL gambar tidak valid.',
        ];

        $validated = $request->validate([
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategori_buku,id',
            'deskripsi'     => 'nullable|string',
            'harga'         => 'required|numeric|min:0',
            'penerbit'      => 'nullable|string|max:255',
            'tahun_terbit'  => 'nullable|integer|min:1900|max:2030',
            'stok'          => 'required|integer|min:0',
            'cover_color'   => 'nullable|string',
            'cover_image'   => 'nullable|string|max:500',
            'is_bestseller' => 'boolean',
            'is_new'        => 'boolean',
        ], $messages);

        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['is_new']        = $request->boolean('is_new');

        $buku->update($validated);

        $slug = $buku->fresh()->kategori->slug ?? 'all';

        return redirect()->route('home', ['kategori' => $slug])
                         ->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage. (Admin Only)
     */
    public function destroy(Buku $buku)
    {
        $this->authorizeAdmin();
        $judul = $buku->judul;
        $buku->delete();

        return redirect()->back()
                         ->with('success', "Buku \"{$judul}\" berhasil dihapus!");
    }

    /**
     * Helper: pastikan user adalah admin
     */
    private function authorizeAdmin(): void
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat melakukan operasi ini.');
        }
    }
}
