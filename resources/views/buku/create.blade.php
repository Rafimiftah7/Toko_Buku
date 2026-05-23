@extends('layouts.app')

@section('title', 'Tambah Buku Baru — Mari Baca')

@section('content')
<div class="min-h-screen py-6 px-4 md:px-8 max-w-3xl mx-auto space-y-6">

    <div class="flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}" class="p-2 bg-white border border-[#EBE3D5] rounded-xl text-[#6D5F53] hover:text-[#2D2621] transition text-xs">← Kembali</a>
        <h1 class="text-lg font-extrabold text-[#2D2621] heading-font">Daftarkan Buku Baru</h1>
    </div>

    @if ($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs space-y-1">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-[#EBE3D5] p-6 shadow-sm">
        <form action="{{ route('buku.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Judul Buku *</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required
                       class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                       placeholder="Masukkan judul buku" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Penulis / Pengarang *</label>
                    <input type="text" name="penulis" value="{{ old('penulis') }}" required
                           class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                           placeholder="Nama penulis" />
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Kategori (Relasi) *</label>
                    <select name="kategori_id" required
                            class="w-full p-2.5 border border-[#EBE3D5] bg-white rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Sinopsis / Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                          placeholder="Ringkasan isi buku...">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Harga (Rp) *</label>
                    <input type="number" name="harga" value="{{ old('harga', 150000) }}" required min="0"
                           class="w-full p-2 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none" />
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Stok *</label>
                    <input type="number" name="stok" value="{{ old('stok', 10) }}" required min="0"
                           class="w-full p-2 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none" />
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', date('Y')) }}" min="1900" max="2030"
                           class="w-full p-2 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ old('penerbit') }}"
                           class="w-full p-2 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none"
                           placeholder="Nama penerbit" />
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#6D5F53] uppercase">Warna Cover (Gradient)</label>
                    <select name="cover_color"
                            class="w-full p-2 border border-[#EBE3D5] bg-white rounded-xl text-sm h-10 focus:outline-none">
                        <option value="linear-gradient(135deg, #f43f5e 0%, #fb923c 100%)">Rose Orange</option>
                        <option value="linear-gradient(135deg, #0d9488 0%, #10b981 100%)">Teal Ocean</option>
                        <option value="linear-gradient(135deg, #65a30d 0%, #84cc16 100%)">Sage Forest</option>
                        <option value="linear-gradient(135deg, #6366f1 0%, #a855f7 100%)">Indigo Purple</option>
                        <option value="linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)">Royal Blue</option>
                        <option value="linear-gradient(135deg, #b45309 0%, #f59e0b 100%)">Autumn Amber</option>
                        <option value="linear-gradient(135deg, #475569 0%, #64748b 100%)">Slate Charcoal</option>
                    </select>
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">URL Gambar Cover (Opsional)</label>
                <input type="url" name="cover_image" value="{{ old('cover_image') }}"
                       class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                       placeholder="https://example.com/cover.jpg" />
            </div>

            <div class="flex gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold select-none">
                    <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller') ? 'checked' : '' }}
                           class="rounded border-[#EBE3D5] text-[#EA6A47]" />
                    <span>Tandai Bestseller?</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold select-none">
                    <input type="checkbox" name="is_new" value="1" {{ old('is_new') ? 'checked' : '' }}
                           class="rounded border-[#EBE3D5] text-[#EA6A47]" />
                    <span>Rilis Baru (New)?</span>
                </label>
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex-1 py-3 text-center bg-[#FAF6F0] hover:bg-[#EBE3D5] text-xs font-bold text-[#6D5F53] rounded-xl border border-[#EBE3D5] transition">
                    Batal
                </a>
                <button type="submit"
                        class="flex-1 p-3 bg-[#EA6A47] text-white font-bold rounded-xl hover:bg-[#D55B39] transition shadow-sm flex items-center justify-center gap-2">
                    💾 Simpan Buku Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
