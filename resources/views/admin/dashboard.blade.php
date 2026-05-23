@extends('layouts.app')

@section('title', 'Admin Panel — Toko Buku Harmony')

@section('content')
<div class="min-h-screen py-6 px-4 md:px-8 max-w-7xl mx-auto space-y-6">

    {{-- Header Admin --}}
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white/85 backdrop-blur-md p-4 rounded-3xl border border-[#EBE3D5] shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-[#EA6A47] to-[#f28e2b] flex items-center justify-center text-white text-xl shadow-md font-bold">⚙️</div>
            <div>
                <div class="flex items-center gap-1.5">
                    <h1 class="text-sm font-extrabold text-[#2D2621] heading-font">Panel Admin — Toko Buku Harmony</h1>
                    <span class="text-[9px] font-black uppercase bg-red-100 text-red-600 px-2 py-0.5 rounded-full">ADMIN</span>
                </div>
                <p class="text-[10px] text-[#8C7A6B]">Halo, {{ Auth::user()->name }} — Kelola data buku & kategori</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" class="px-3 py-2 bg-[#FAF6F0] hover:bg-white border border-[#EBE3D5] text-[#6D5F53] text-xs font-semibold rounded-xl transition">🏠 Storefront</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-3 py-2 bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 text-xs font-bold rounded-xl transition">Keluar</button>
            </form>
        </div>
    </header>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-2xl">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-2xl">❌ {{ session('error') }}</div>
    @endif

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl border border-[#EBE3D5] p-4 text-center shadow-sm">
            <p class="text-3xl font-black text-[#EA6A47]">{{ $buku->count() }}</p>
            <p class="text-xs text-[#6D5F53] font-medium mt-1">Total Buku</p>
        </div>
        <div class="bg-white rounded-2xl border border-[#EBE3D5] p-4 text-center shadow-sm">
            <p class="text-3xl font-black text-emerald-600">{{ $kategoriList->count() }}</p>
            <p class="text-xs text-[#6D5F53] font-medium mt-1">Total Kategori</p>
        </div>
        <div class="bg-white rounded-2xl border border-[#EBE3D5] p-4 text-center shadow-sm">
            <p class="text-3xl font-black text-blue-600">{{ $buku->where('is_new', true)->count() }}</p>
            <p class="text-xs text-[#6D5F53] font-medium mt-1">Buku Terbaru</p>
        </div>
        <div class="bg-white rounded-2xl border border-[#EBE3D5] p-4 text-center shadow-sm">
            <p class="text-3xl font-black text-amber-600">{{ $buku->where('is_bestseller', true)->count() }}</p>
            <p class="text-xs text-[#6D5F53] font-medium mt-1">Bestseller</p>
        </div>
    </div>

    {{-- CRUD BUKU --}}
    <div class="bg-white rounded-2xl border border-[#EBE3D5] shadow-sm overflow-hidden">
        <div class="flex items-center justify-between p-5 border-b border-[#F5EFE6]">
            <h2 class="text-sm font-extrabold text-[#2D2621] heading-font">📚 Manajemen Data Buku (CRUD)</h2>
            <a href="{{ route('buku.create') }}"
               class="flex items-center gap-1.5 px-4 py-2 bg-[#EA6A47] hover:bg-[#D55B39] text-white font-bold text-xs rounded-xl transition shadow-sm">
                + Tambah Buku Baru
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="bg-[#FAF6F0] border-b border-[#EBE3D5] text-[#6D5F53] font-semibold text-xs uppercase tracking-wider">
                        <th class="p-4">Buku (Judul & Penulis)</th>
                        <th class="p-4">Kategori (Relasi)</th>
                        <th class="p-4 text-right">Harga</th>
                        <th class="p-4 text-center">Stok</th>
                        <th class="p-4">Penerbit</th>
                        <th class="p-4 text-center">Badge</th>
                        <th class="p-4 text-center">Aksi CRUD</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F5EFE6]">
                    @forelse ($buku as $b)
                        <tr class="hover:bg-[#FAF6F0] transition">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-10 rounded shadow-xs flex-shrink-0" style="background: {{ $b->cover_color }}"></div>
                                    <div>
                                        <p class="font-semibold text-sm text-[#2D2621]">{{ $b->judul }}</p>
                                        <p class="text-xs text-[#6D5F53]">{{ $b->penulis }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 bg-[#F5EFE6] text-[#6D5F53] text-xs font-medium rounded-full">
                                    {{ $b->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="p-4 text-right font-medium text-[#2D2621] text-xs">
                                Rp {{ number_format($b->harga, 0, ',', '.') }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="font-mono text-sm font-semibold {{ $b->stok <= 2 ? 'text-red-500' : ($b->stok <= 5 ? 'text-amber-600' : 'text-emerald-600') }}">
                                    {{ $b->stok }} pcs
                                </span>
                            </td>
                            <td class="p-4 text-[#6D5F53] text-xs max-w-[120px] truncate">
                                {{ $b->penerbit }} ({{ $b->tahun_terbit }})
                            </td>
                            <td class="p-4 text-center space-x-1">
                                @if($b->is_bestseller)
                                    <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-1.5 py-0.5 rounded">Best</span>
                                @endif
                                @if($b->is_new)
                                    <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-1.5 py-0.5 rounded">Baru</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('buku.edit', $b->id) }}"
                                       class="p-1 px-2.5 bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-700 font-semibold rounded-lg text-xs flex items-center gap-1 transition">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('buku.destroy', $b->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus buku \'{{ addslashes($b->judul) }}\'?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-1 px-2.5 bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 font-semibold rounded-lg text-xs flex items-center gap-1 transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-[#6D5F53] text-sm">
                                Belum ada data buku. <a href="{{ route('buku.create') }}" class="text-[#EA6A47] font-bold">Tambah buku pertama!</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- CRUD KATEGORI --}}
    <div class="bg-white rounded-2xl border border-[#EBE3D5] shadow-sm overflow-hidden">
        <div class="flex items-center justify-between p-5 border-b border-[#F5EFE6]">
            <h2 class="text-sm font-extrabold text-[#2D2621] heading-font">🏷️ Manajemen Kategori Buku (Relasi Tabel)</h2>
            <a href="{{ route('kategori.create') }}"
               class="flex items-center gap-1.5 px-4 py-2 bg-[#EA6A47] hover:bg-[#D55B39] text-white font-bold text-xs rounded-xl transition shadow-sm">
                + Buat Kategori Baru
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-5">
            @forelse ($kategoriList as $kat)
                <div class="p-4 bg-[#FAF6F0] rounded-xl border border-[#EBE3D5] flex flex-col justify-between space-y-3">
                    <div class="flex justify-between items-start">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-base font-bold text-[#2D2621]">{{ $kat->nama_kategori }}</span>
                                <code class="text-[10px] bg-white px-1.5 py-0.5 border rounded text-[#6D5F53] font-mono">id: {{ $kat->id }}</code>
                            </div>
                            <p class="text-xs text-[#6D5F53]">{{ $kat->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                        </div>
                        <span class="text-[11px] font-semibold bg-[#EBE3D5] text-[#2D2621] px-2 py-0.5 rounded-full font-mono">{{ $kat->buku_count }} Buku</span>
                    </div>
                    <div class="flex items-center justify-end gap-2 border-t border-[#EBE3D5] pt-3">
                        <a href="{{ route('kategori.edit', $kat->id) }}"
                           class="px-2.5 py-1.5 bg-white hover:bg-[#F5EFE6] border border-[#EBE3D5] text-amber-700 font-semibold rounded-lg text-xs flex items-center gap-1 transition">
                            ✏️ Edit
                        </a>
                        @if($kat->buku_count == 0)
                            <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus kategori \'{{ addslashes($kat->nama_kategori) }}\'?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2.5 py-1.5 text-xs font-semibold rounded-lg flex items-center gap-1 border transition bg-red-50 hover:bg-red-100 border-red-200 text-red-600">
                                    🗑️ Hapus
                                </button>
                            </form>
                        @else
                            <button disabled title="Tidak bisa dihapus: masih ada buku"
                                    class="px-2.5 py-1.5 text-xs font-semibold rounded-lg flex items-center gap-1 border bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed">
                                🔒 Terkunci
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center p-8 text-[#6D5F53] text-sm">
                    Belum ada kategori. <a href="{{ route('kategori.create') }}" class="text-[#EA6A47] font-bold">Tambah kategori!</a>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
