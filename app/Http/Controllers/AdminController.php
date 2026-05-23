<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

/**
 * AdminController — Dashboard Admin untuk CRUD lengkap
 */
class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya Admin yang dapat mengakses panel ini.');
        }

        $buku         = Buku::with('kategori')->latest()->get();
        $kategoriList = Kategori::withCount('buku')->get();

        return view('admin.dashboard', compact('buku', 'kategoriList'));
    }
}
