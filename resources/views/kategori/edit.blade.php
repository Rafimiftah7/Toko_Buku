@extends('layouts.app')
@section('title', 'Edit Kategori — ' . $kategori->nama_kategori)
@section('content')
<div class="min-h-screen py-6 px-4 md:px-8 max-w-2xl mx-auto space-y-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}" class="p-2 bg-white border border-[#EBE3D5] rounded-xl text-[#6D5F53] text-xs">← Kembali</a>
        <h1 class="text-lg font-extrabold text-[#2D2621] heading-font">Edit Kategori: {{ $kategori->nama_kategori }}</h1>
    </div>
    @if ($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs">
            @foreach ($errors->all() as $error)<p>• {{ $error }}</p>@endforeach
        </div>
    @endif
    <div class="bg-white rounded-2xl border border-[#EBE3D5] p-6 shadow-sm">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Nama Kategori *</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required
                       class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]" />
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Icon</label>
                <select name="icon" class="w-full p-2.5 border border-[#EBE3D5] bg-white rounded-xl text-sm focus:outline-none">
                    @foreach(['BookOpen' => 'Buku Terbuka (Classic)', 'Feather' => 'Pena Bulu (Fiksi)', 'Sparkles' => 'Bintang (Rilis Baru)', 'Smartphone' => 'Handphone (eBook)', 'Layers' => 'Tumpukan (Manga)', 'Flame' => 'Api (Fantasi)', 'Award' => 'Medali (Bestseller)', 'Bookmark' => 'Bookmark (Klasik)'] as $val => $label)
                        <option value="{{ $val }}" {{ old('icon', $kategori->icon) == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-[#6D5F53] uppercase">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full p-2.5 border border-[#EBE3D5] rounded-xl text-sm focus:outline-none focus:border-[#EA6A47]">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.dashboard') }}" class="flex-1 py-3 text-center bg-[#FAF6F0] text-xs font-bold text-[#6D5F53] rounded-xl border border-[#EBE3D5]">Batal</a>
                <button type="submit" class="flex-1 p-3 bg-[#EA6A47] text-white font-bold rounded-xl hover:bg-[#D55B39] transition shadow-sm">💾 Perbarui Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
