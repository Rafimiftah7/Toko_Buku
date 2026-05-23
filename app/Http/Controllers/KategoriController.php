<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * KategoriController — Resource Controller untuk CRUD Kategori Buku
 * Admin Only
 */
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource. (Admin)
     */
    public function index()
    {
        $this->authorizeAdmin();
        $kategoriList = Kategori::withCount('buku')->get();
        return view('kategori.index', compact('kategoriList'));
    }

    /**
     * Show the form for creating a new resource. (Admin)
     */
    public function create()
    {
        $this->authorizeAdmin();
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage. (Admin)
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'icon'          => 'nullable|string|max:100',
            'deskripsi'     => 'nullable|string',
        ]);

        $validated['slug'] = Kategori::generateSlug($validated['nama_kategori']);

        // Pastikan slug unik
        $baseSlug = $validated['slug'];
        $count = 1;
        while (Kategori::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $count++;
        }

        Kategori::create($validated);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource. (Admin)
     */
    public function edit(Kategori $kategori)
    {
        $this->authorizeAdmin();
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage. (Admin)
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'icon'          => 'nullable|string|max:100',
            'deskripsi'     => 'nullable|string',
        ]);

        $validated['slug'] = Kategori::generateSlug($validated['nama_kategori']);

        // Pastikan slug unik (kecuali slug milik sendiri)
        $baseSlug = $validated['slug'];
        $count = 1;
        while (Kategori::where('slug', $validated['slug'])->where('id', '!=', $kategori->id)->exists()) {
            $validated['slug'] = $baseSlug . '-' . $count++;
        }

        $kategori->update($validated);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage. (Admin)
     */
    public function destroy(Kategori $kategori)
    {
        $this->authorizeAdmin();

        // Cek apakah masih ada buku dalam kategori ini
        if ($kategori->buku()->count() > 0) {
            return redirect()->route('admin.dashboard')
                             ->with('error', "Kategori \"{$kategori->nama_kategori}\" tidak bisa dihapus karena masih memiliki buku. Pindahkan atau hapus buku tersebut terlebih dahulu.");
        }

        $nama = $kategori->nama_kategori;
        $kategori->delete();

        return redirect()->route('admin.dashboard')
                         ->with('success', "Kategori \"{$nama}\" berhasil dihapus!");
    }

    /**
     * Helper: pastikan user adalah admin
     */
    private function authorizeAdmin(): void
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat mengelola kategori.');
        }
    }
}
