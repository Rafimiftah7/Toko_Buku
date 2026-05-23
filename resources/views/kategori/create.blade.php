@extends('layouts.app')
@section('title', 'Tambah Kategori — Mari Baca')
@section('content')
<div class="min-h-screen py-6 px-4 md:px-8 max-w-2xl mx-auto space-y-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}" class="p-2 bg-white border border-[#EBE3D5] rounded-xl text-[#6D5F53] text-xs">← Kembali</a>
        <h1 class="text-lg font-extrabold text-[#2D2621] heading-font">Buat Kategori Baru</h1>
    </div>
    @if ($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs">
            @foreach ($errors->all() as $error)<p>• {{ $error }}</p>@endforeach
        </div>
    @endif
    <div class="bg-white rounded-2xl border border-[#EBE3D5] p-6 shadow-sm">
        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Nama Kategori *</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required
                       class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                       placeholder="Misal: Romance, Sejarah, Sains" />
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Icon</label>
                <select name="icon" class="w-full p-2.5 border border-[#EBE3D5] bg-white rounded-xl text-sm focus:outline-none">
                    <option value="BookOpen">Buku Terbuka (Classic)</option>
                    <option value="Feather">Pena Bulu (Fiksi)</option>
                    <option value="Sparkles">Bintang (Rilis Baru)</option>
                    <option value="Smartphone">Handphone (Digital eBook)</option>
                    <option value="Layers">Tumpukan (Manga)</option>
                    <option value="Flame">Api (Fantasi Epik)</option>
                    <option value="Award">Medali (Bestseller)</option>
                    <option value="Bookmark">Bookmark (Klasik)</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Deskripsi Ringkas</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]"
                          placeholder="Keterangan kategori buku ini...">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.dashboard') }}" class="flex-1 py-3 text-center bg-[#FAF6F0] text-xs font-bold text-[#6D5F53] rounded-xl border border-[#EBE3D5] transition">Batal</a>
                <button type="submit" class="flex-1 p-3 bg-[#EA6A47] text-white font-bold rounded-xl hover:bg-[#D55B39] transition shadow-sm">💾 Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
