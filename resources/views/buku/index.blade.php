{{-- 
=========================================================================================
SISTEM VIEW UTS - LARAVEL MVC STOREFRONT (100% BLADE ENGINE)
=========================================================================================
File ini adalah representasi Tampilan Utama (View index) untuk UTS Pemrograman Web 2.
Murni di-render sisi server (Server-Side Rendering) oleh Laravel MVC Engine.
Controller: BukuController@index
    - $buku        : Collection data Model Buku lengkap beserta relasi 'kategori'
    - $kategoriList: Collection data Model Kategori Buku untuk filter menu
=========================================================================================
--}}

@extends('layouts.app')

@section('title', 'Katalog Buku — Mari Baca')

@section('content')
<div class="min-h-screen flex flex-col justify-between py-6 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="w-full space-y-6">

        {{-- ==================================================================================
             1. HEADER & NAVIGATION BAR
             ================================================================================== --}}
        <header class="flex flex-wrap md:flex-nowrap items-center justify-between gap-3 md:gap-4 bg-white p-3 md:p-3 md:pr-4 rounded-[28px] md:rounded-full border border-[#EBE3D5] shadow-sm mt-4">
            {{-- User Profile Info --}}
            <div class="order-1 group flex items-center gap-3 pl-1 w-auto cursor-pointer hover:bg-[#FCFAEF] p-1.5 rounded-full transition-all duration-300 hover:shadow-sm" onclick="toggleProfileModal(true)">
                <div class="w-[42px] h-[42px] rounded-full border border-[#EBE3D5] bg-[#FAF6F0] flex items-center justify-center text-xl shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 shadow-sm">
                    🦉
                </div>
                <div class="flex flex-col justify-center leading-tight">
                    @auth
                        <div class="text-[11px] text-[#8C7A6B]">
                            Selamat datang, <span class="font-bold text-[#EA6A47] capitalize">Orang baik</span>
                        </div>
                        <div class="text-[13px] font-extrabold text-[#2D2621] mt-0.5 flex items-center gap-1">
                            Hi, {{ Auth::user()->name }}!
                        </div>
                    @else
                        <div class="text-[11px] text-[#8C7A6B]">
                            Selamat datang, <span class="font-bold text-[#EA6A47]">Guest</span>
                        </div>
                        <div class="text-[13px] font-extrabold text-[#2D2621] mt-0.5 flex items-center gap-1">
                            Silakan Masuk
                        </div>
                    @endauth
                </div>
            </div>

            {{-- Search Form --}}
            <div class="order-3 md:order-2 w-full md:w-auto md:flex-1 px-1 md:px-6 group">
                <form action="{{ route('home') }}" method="GET" class="relative w-full">
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-[#EA6A47] transition-colors duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input
                        type="text"
                        name="cari"
                        value="{{ request('cari') }}"
                        class="w-full pl-11 pr-4 py-2.5 bg-[#FCFAEF] border border-[#EBE3D5] rounded-full text-xs text-[#2D2621] placeholder-[#A89F96] focus:outline-none focus:border-[#EA6A47] focus:bg-white focus:shadow-md focus:ring-4 focus:ring-[#EA6A47]/10 hover:border-[#D55B39] transition-all duration-300"
                        placeholder="Cari novel, komik, judul buku, atau penulis..."
                    />
                </form>
            </div>

            {{-- Action Buttons --}}
            <div class="order-2 md:order-3 flex items-center gap-2 md:gap-2.5 shrink-0 justify-end">
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center bg-[#FCFAEF] hover:bg-[#EA6A47] border border-[#EBE3D5] text-[#6D5F53] hover:text-white rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-md cursor-pointer" title="Admin Panel">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-[#FAF6F0] hover:bg-[#EA6A47] border border-[#EBE3D5] text-[#6D5F53] hover:text-white text-[11px] font-bold rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        Daftar
                    </a>
                @endauth

                {{-- Cart Button --}}
                <button onclick="toggleCartDrawer(true)" class="group relative w-10 h-10 flex items-center justify-center bg-[#FCFAEF] hover:bg-[#EA6A47] border border-[#EBE3D5] text-[#2D2621] hover:text-white rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-md cursor-pointer">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                    <span id="cartBadgeCount" class="absolute -top-1 -right-1 bg-[#EA6A47] group-hover:bg-white group-hover:text-[#EA6A47] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-white shadow-sm hidden transition-colors duration-300">0</span>
                </button>
            </div>
        </header>

        {{-- Session Alerts --}}
        @if(session('success'))
            <div class="p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-2xl flex items-center gap-2">
                <span>✅</span> <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-2xl flex items-center gap-2">
                <span>❌</span> <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- ==================================================================================
             2. PROMO BANNER (New Year Sale)
             ================================================================================== --}}
        <section onclick="claimPromo()" class="group mt-8 relative overflow-hidden rounded-[24px] bg-gradient-to-r from-[#1E1B4B] via-[#4C1D95] to-[#BE185D] p-7 lg:p-10 text-white shadow-lg flex flex-col md:flex-row items-start md:items-center justify-between gap-6 cursor-pointer hover:scale-[1.01] hover:shadow-pink-500/30 transition-all duration-300">
            {{-- Decorative Background Elements --}}
            <div class="absolute top-0 right-0 w-72 h-72 bg-pink-500/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4 group-hover:scale-110 group-hover:bg-pink-400/40 transition-transform duration-700"></div>
            <div class="absolute bottom-0 left-10 w-48 h-48 bg-indigo-500/40 rounded-full blur-2xl translate-y-1/3 group-hover:-translate-y-1/4 transition-transform duration-1000"></div>
            
            {{-- Floating Elements --}}
            <div class="absolute right-1/4 top-4 text-3xl opacity-20 group-hover:opacity-100 group-hover:-translate-y-2 transition-all duration-500">🎆</div>
            <div class="absolute right-10 bottom-4 text-4xl opacity-10 group-hover:opacity-80 group-hover:-translate-y-3 transition-all duration-700 delay-100">🎇</div>

            {{-- Left Content --}}
            <div class="relative z-10 max-w-xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-[10px] font-bold uppercase tracking-widest backdrop-blur-md border border-white/20 mb-3 shadow-sm group-hover:bg-white/20 transition-colors">
                    PROMO SPESIAL TAHUN BARU
                    <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </span>
                <h2 class="text-3xl lg:text-4xl font-black heading-font tracking-tight mb-2 drop-shadow-lg text-transparent bg-clip-text bg-gradient-to-r from-white to-pink-200">
                    New Year Mega Sale
                </h2>
                <p class="text-[13px] lg:text-sm text-pink-100 font-light leading-relaxed group-hover:text-white transition-colors">
                    Awali tahun barumu dengan cerita baru! Nikmati potongan harga khusus novel & komik hingga 50%.
                </p>
            </div>

            {{-- Right Content (Price Tag) --}}
            <div class="relative z-10 shrink-0 md:text-right mt-2 md:mt-0 flex flex-col items-start md:items-end">
                <div class="text-4xl font-black tracking-tighter drop-shadow-md group-hover:scale-105 transition-transform origin-right">Rp 100.000</div>
                <div class="text-xs font-medium text-pink-200 mt-1 uppercase tracking-widest mb-3">Voucher Belanja</div>
                <button class="px-5 py-2 bg-white text-[#4C1D95] text-[11px] font-black rounded-full shadow-lg group-hover:bg-pink-50 transition-colors">
                    Klaim Sekarang
                </button>
            </div>
        </section>

        {{-- ==================================================================================
             3. KATEGORI BUKU
             ================================================================================== --}}
        <section class="space-y-3 mt-8">
            <div class="flex items-center justify-between px-1">
                <span class="text-[11px] font-bold text-[#8C7A6B] uppercase tracking-widest">Kategori Buku</span>
                <span class="text-[9px] text-[#A89F96] bg-[#FCFAEF] border border-[#EBE3D5] px-2.5 py-1 rounded-full font-medium select-none">
                    Real-time filter
                </span>
            </div>
            <div class="flex items-center gap-2.5 overflow-x-auto pb-2 scrollbar-none">
                @php $isAllActive = !request('kategori') || request('kategori') == 'all'; @endphp
                <a href="{{ request()->fullUrlWithQuery(['kategori' => 'all']) }}"
                   class="flex items-center gap-2 px-5 py-2.5 rounded-full text-[11px] font-bold whitespace-nowrap transition-all duration-300 cursor-pointer hover:scale-105 hover:-translate-y-0.5 {{ $isAllActive ? 'bg-[#EA6A47] text-white shadow-md border border-[#EA6A47]' : 'bg-white hover:bg-[#FAF6F0] border border-[#EBE3D5] text-[#6D5F53] hover:text-[#EA6A47] hover:shadow-sm' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    All
                </a>
                
                @php
                    $icons = [
                        'eBooks' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                        'Terbaru' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>',
                        'Fiksi' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>',
                        'Manga' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>',
                        'Fantasi' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>',
                        'Bestseller' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>',
                        'Klasik' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>'
                    ];
                    $defaultIcon = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>';
                @endphp

                @foreach ($kategoriList as $cat)
                    @if(strtolower($cat->nama_kategori) === 'semua')
                        @continue
                    @endif
                    @php
                        $catSlug = $cat->slug;
                        $isActive = request('kategori') == $catSlug;
                        $matchedIcon = $defaultIcon;
                        foreach($icons as $key => $icon) {
                            if(stripos($cat->nama_kategori, $key) !== false) {
                                $matchedIcon = $icon;
                                break;
                            }
                        }
                    @endphp
                    <a href="{{ request()->fullUrlWithQuery(['kategori' => $catSlug]) }}"
                       class="flex items-center gap-2 px-5 py-2.5 rounded-full text-[11px] font-bold whitespace-nowrap transition-all duration-300 cursor-pointer hover:scale-105 hover:-translate-y-0.5 {{ $isActive ? 'bg-[#EA6A47] text-white shadow-md border border-[#EA6A47]' : 'bg-white hover:bg-[#FAF6F0] border border-[#EBE3D5] text-[#6D5F53] hover:text-[#EA6A47] hover:shadow-sm' }}">
                        {!! $matchedIcon !!}
                        <span>{{ $cat->nama_kategori }}</span>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ==================================================================================
             4. BOOK CATALOG GRID — Eloquent ORM Data
             ================================================================================== --}}
        <main class="space-y-4">
            <div class="flex items-center justify-between px-0.5">
                <div>
                    <h3 class="text-sm font-extrabold text-[#2D2621] heading-font tracking-wide uppercase">
                        Katalog Buku Perpustakaan ({{ count($buku) }})
                    </h3>
                </div>
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('buku.create') }}"
                           class="flex items-center gap-1.5 px-4 py-2 bg-[#EA6A47] hover:bg-[#D55B39] text-white font-bold text-xs rounded-xl transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:scale-95">
                            + Tambah Buku
                        </a>
                    @endif
                @endauth
            </div>

            @if(count($buku) == 0)
                {{-- Empty State --}}
                <div class="p-12 bg-white rounded-3xl border border-[#EBE3D5] text-center space-y-3 shadow-2xs">
                    <span class="text-orange-500 text-4xl block animate-bounce">📭</span>
                    <h4 class="text-[#2D2621] font-bold text-sm">Buku Tidak Ditemukan</h4>
                    <p class="text-[#6D5F53] text-xs max-w-md mx-auto leading-relaxed">
                        Belum ada entri data buku di database atau pustaka kategori yang Anda cari kosong.
                    </p>
                    @if(request()->hasAny(['cari', 'kategori']))
                        <a href="{{ route('home') }}" class="inline-block mt-2 px-4 py-2 bg-[#EA6A47] text-white text-xs font-bold rounded-xl shadow-md">
                            Reset Semua Pencarian
                        </a>
                    @endif
                </div>
            @else
                {{-- Book Card Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 relative">
                    @foreach ($buku as $item)
                        @php
                            $gradients = [
                                'linear-gradient(135deg, #f43f5e 0%, #fb923c 100%)',
                                'linear-gradient(135deg, #0d9488 0%, #10b981 100%)',
                                'linear-gradient(135deg, #65a30d 0%, #84cc16 100%)',
                                'linear-gradient(135deg, #6366f1 0%, #a855f7 100%)',
                                'linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)',
                                'linear-gradient(135deg, #DE935F 0%, #f59e0b 100%)',
                            ];
                            $coverStyle = $item->cover_color ?? ($gradients[$item->id % count($gradients)] ?? 'linear-gradient(135deg, #DE935F 0%, #f59e0b 100%)');
                        @endphp

                        <div class="group bg-white rounded-3xl border border-[#EBE3D5] p-3 shadow-2xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 cursor-pointer flex flex-col justify-between"
                             onclick="openBookDetail('{{ addslashes($item->judul) }}', '{{ addslashes($item->penulis) }}', '{{ addslashes($item->deskripsi ?? 'Tidak ada sinopsis resmi.') }}', '{{ $item->harga }}', '{{ addslashes($item->penerbit ?? 'Pustaka Mari Baca') }}', '{{ $item->tahun_terbit ?? 'N/A' }}', '{{ $item->stok }}', '{{ addslashes($coverStyle) }}', '{{ $item->cover_image ?? '' }}', '{{ addslashes($item->kategori->nama_kategori ?? 'Umum') }}')">

                            <div class="space-y-3">
                                {{-- BOOK COVER --}}
                                <div class="w-full aspect-[3/4] rounded-2xl shadow-xs relative overflow-hidden p-4 flex flex-col justify-between bg-cover bg-center group-hover:shadow-md transition-all duration-500"
                                     style="background: {{ $coverStyle }}">
                                    @if(!empty($item->cover_image))
                                        <img src="{{ $item->cover_image }}" alt="{{ $item->judul }}" referrerpolicy="no-referrer" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-110 transition-transform duration-700 ease-out" />
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/15 to-transparent z-1"></div>
                                    <div class="absolute inset-y-0 left-0 w-2 bg-black/10 backdrop-blur-xs z-2"></div>

                                    {{-- Badges --}}
                                    <div class="space-y-1 z-10 self-start">
                                        @if($item->is_bestseller)
                                            <span class="inline-block text-[8px] font-extrabold uppercase bg-amber-400 text-amber-950 px-2 py-0.5 rounded-md shadow-xs">Best Novel</span>
                                        @endif
                                        @if($item->is_new)
                                            <span class="inline-block text-[8px] font-extrabold uppercase bg-blue-500 text-white px-2 py-0.5 rounded-md shadow-xs">Terbaru</span>
                                        @endif
                                    </div>

                                    {{-- Cover Text --}}
                                    <div class="text-white drop-shadow-sm space-y-0.5 z-10">
                                        <p class="font-mono text-[8px] text-white/70 uppercase tracking-widest leading-none">Pustaka Utama</p>
                                        <h4 class="font-bold text-xs line-clamp-2 md:text-sm tracking-tight leading-snug">{{ $item->judul }}</h4>
                                        <p class="text-[9px] text-white/90 truncate italic font-light">by {{ $item->penulis }}</p>
                                    </div>
                                </div>

                                {{-- Book Metadata --}}
                                <div class="space-y-1 px-1">
                                    <span class="text-[9px] font-bold tracking-wide uppercase text-orange-500 block">
                                        {{ $item->kategori->nama_kategori ?? 'Umum' }}
                                    </span>
                                    <h4 class="font-bold text-xs text-[#2D2621] line-clamp-1 group-hover:text-orange-600 transition-colors">{{ $item->judul }}</h4>
                                    <p class="text-[9.5px] text-[#6D5F53] truncate">{{ $item->penulis }}</p>
                                </div>
                            </div>

                            {{-- Pricing & CTA --}}
                            <div class="mt-3 pt-2.5 border-t border-[#F5EFE6] space-y-2">
                                <div class="flex items-end justify-between px-1 gap-1">
                                    <div class="flex flex-col shrink">
                                        <span class="text-[8px] font-bold text-[#EA6A47] uppercase leading-none bg-orange-50 px-1 py-0.5 rounded shadow-2xs self-start mb-1">DISKON UTS</span>
                                        <div class="flex flex-col items-start gap-0.5">
                                            <span class="text-[9px] text-gray-400 line-through leading-none">Rp {{ number_format($item->harga * 1.25, 0, ',', '.') }}</span>
                                            <p class="text-[11px] lg:text-xs font-black text-[#EA6A47] font-mono leading-none animate-pulse-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <button class="p-1 px-2.5 rounded-lg text-[9px] font-bold bg-orange-50 hover:bg-[#EA6A47] border border-orange-200 text-[#EA6A47] hover:text-white transition-all duration-300 active:scale-95 hover:shadow-md inline-flex items-center gap-1 group-hover:-translate-y-0.5"
                                            onclick="event.stopPropagation(); addToCart('{{ $item->id }}', '{{ addslashes($item->judul) }}', '{{ $item->harga }}', '{{ addslashes($coverStyle) }}')">
                                        <span class="group-hover:animate-bounce">🛒</span> + Beli
                                    </button>
                                </div>
                                @php $qty = $item->stok ?? 0; @endphp
                                <div class="flex justify-between items-center text-[10px] px-1 text-gray-400 font-medium">
                                    <span>Stok Tersedia:</span>
                                    <span class="font-mono font-bold {{ $qty <= 2 ? 'text-red-500' : 'text-emerald-600' }}">{{ $qty }} pcs</span>
                                </div>

                                {{-- Admin Actions (hanya tampil jika admin) --}}
                                @auth
                                    @if(Auth::user()->isAdmin())
                                        <div class="flex gap-1.5 pt-1.5 border-t border-[#FAF6F0]" onclick="event.stopPropagation()">
                                            <a href="{{ route('buku.edit', $item->id) }}"
                                               class="flex-1 py-1.5 text-center text-[9px] font-bold bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-700 rounded-lg transition">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="flex-1"
                                                  onsubmit="if(!confirm('Yakin hapus buku {{ addslashes($item->judul) }}?')){return false;} sessionStorage.setItem('scrollY', window.scrollY); return true;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="w-full py-1.5 text-[9px] font-bold bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 rounded-lg transition">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>


{{-- ==================================================================================
     6. SHOPPING CART DRAWER
     ================================================================================== --}}
<div id="cartDrawer" class="fixed inset-0 bg-[#2D2621]/45 backdrop-blur-xs hidden items-center justify-end z-50">
    <div class="absolute inset-0 cursor-pointer" onclick="toggleCartDrawer(false)"></div>
    <div id="cartContent" class="bg-white h-full w-full max-w-md border-l border-[#EBE3D5] p-6 flex flex-col justify-between shadow-2xl transition-transform duration-300 transform translate-x-full z-10">
        <div class="space-y-4 flex-1 overflow-y-auto">
            <div class="flex justify-between items-center border-b border-[#FAF6F0] pb-3">
                <h4 class="text-sm font-extrabold text-[#2D2621] flex items-center gap-2 font-sans uppercase">
                    <span>🛒</span> Keranjang Belanja UTS
                </h4>
                <button onclick="toggleCartDrawer(false)" class="p-1.5 hover:bg-[#FAF6F0] rounded-full text-gray-400 hover:text-gray-600 font-bold transition">✕</button>
            </div>
            <div id="cartList" class="space-y-4"></div>
        </div>
        <div id="cartFooter" class="border-t border-[#FAF6F0] pt-4 space-y-4 hidden">
            <div class="space-y-1.5 text-xs text-[#6D5F53]">
                <div class="flex justify-between">
                    <span>Total Kuantitas:</span>
                    <span id="cartTotalItems" class="font-bold text-[#2D2621]">0 pcs</span>
                </div>
                <div class="flex justify-between text-sm text-[#2D2621]">
                    <span class="font-bold">Total Belanjaan:</span>
                    <span id="cartSubtotal" class="font-mono font-bold text-[#EA6A47] text-base">Rp 0</span>
                </div>
            </div>
            <button onclick="completeCheckoutSimulation()" class="w-full py-3 bg-[#EA6A47] hover:bg-[#D55B39] text-white font-bold text-xs rounded-xl transition shadow-md flex items-center justify-center gap-2 uppercase tracking-wider">
                Selesaikan Pembelian (Checkout)
            </button>
        </div>
    </div>
</div>

{{-- ==================================================================================
     7. BOOK DETAIL MODAL
     ================================================================================== --}}
<div id="detailModal" class="fixed inset-0 bg-black/45 backdrop-blur-xs hidden items-center justify-center p-4 z-50">
    <div class="absolute inset-0 cursor-pointer" onclick="toggleDetailModal(false)"></div>
    <div id="detailContent" class="bg-white rounded-3xl border border-[#EBE3D5] max-w-lg w-full overflow-hidden relative z-10 transition-all duration-300 transform scale-95 opacity-0">
        <div id="modalHeader" class="p-8 relative text-white flex flex-col justify-end min-h-[170px] overflow-hidden">
            <img id="detailCoverImage" src="" alt="Book Cover" class="absolute inset-0 w-full h-full object-cover z-0 hidden" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/20 z-1"></div>
            <button onclick="toggleDetailModal(false)" class="absolute top-4 right-4 w-8 h-8 bg-black/40 hover:bg-black/60 text-white rounded-full flex items-center justify-center transition z-10">✕</button>
            <div class="space-y-1 z-10">
                <span id="detailCategory" class="text-[8px] font-black uppercase text-amber-300 tracking-widest bg-black/30 px-2 py-0.5 rounded-full inline-block">KATEGORI</span>
                <h3 id="detailTitle" class="text-lg font-bold tracking-tight">Judul Buku</h3>
                <p id="detailAuthor" class="text-xs text-white/90 italic font-light">Penulis Buku</p>
            </div>
        </div>
        <div class="p-6 space-y-4 bg-white">
            <div class="space-y-1">
                <span class="text-xs font-bold text-[#6D5F53] uppercase tracking-wider block">Sinopsis Pustaka</span>
                <p id="detailDesc" class="text-xs text-[#2D2621] leading-relaxed font-light">Silakan baca resume sinopsis disini.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 border-t border-b border-[#F5EFE6] py-3.5 text-xs">
                <div>
                    <p class="text-[#8C7A6B]">Penerbit & Tahun:</p>
                    <p id="detailPublisher" class="font-bold text-[#2D2621]">-</p>
                </div>
                <div>
                    <p class="text-[#8C7A6B]">Stok Tersedia:</p>
                    <p id="detailStock" class="font-bold font-mono text-emerald-600">-</p>
                </div>
                <div>
                    <p class="text-[#8C7A6B]">Harga Promo UTS:</p>
                    <p id="detailPrice" class="font-extrabold text-[#EA6A47] text-sm font-mono">-</p>
                </div>
            </div>
            <button onclick="toggleDetailModal(false)" class="w-full py-3 bg-[#FAF6F0] hover:bg-[#EBE3D5] text-xs font-bold text-[#6D5F53] rounded-xl border border-[#EBE3D5] transition-all">
                Tutup Detail
            </button>
        </div>
    </div>
</div>

        {{-- ==================================================================================
             PROFILE MODAL
             ================================================================================== --}}
        <div id="profileModal" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm items-center justify-center transition-opacity opacity-0 p-4">
            <div id="profileContent" class="bg-white rounded-[24px] shadow-2xl w-full max-w-[360px] transform scale-95 opacity-0 transition-all duration-300 relative overflow-hidden flex flex-col p-6 border border-[#EBE3D5]">
                
                {{-- Decorative drag handle (visual only) --}}
                <div class="w-10 h-1 bg-[#EBE3D5] rounded-full mx-auto mb-4"></div>

                {{-- Close button --}}
                <button onclick="toggleProfileModal(false)" class="absolute top-5 right-5 w-7 h-7 flex items-center justify-center rounded-full bg-[#FAF6F0] hover:bg-[#EBE3D5] text-[#6D5F53] transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                {{-- Header --}}
                <div class="mb-4 pr-6">
                    <h3 class="text-[15px] font-extrabold text-[#2D2621] heading-font tracking-tight">Profil Pengguna</h3>
                    <p class="text-[10px] text-[#8C7A6B] mt-0.5">Pusat kendali akun & autentikasi</p>
                </div>

                {{-- User Card Box --}}
                <div class="bg-[#FCFAEF] border border-[#EBE3D5] rounded-2xl p-4 flex items-center gap-3 mb-5">
                    <div class="w-[42px] h-[42px] rounded-full bg-white border border-[#EBE3D5] flex items-center justify-center text-xl shrink-0 shadow-sm">
                        🦉
                    </div>
                    @auth
                    <div class="flex-1 overflow-hidden">
                        <div class="flex items-center gap-2">
                            <h4 class="text-xs font-bold text-[#2D2621] truncate">{{ Auth::user()->name }}</h4>
                            <span class="text-[8px] font-bold text-[#EA6A47] bg-orange-100 px-1.5 py-0.5 rounded uppercase shrink-0">CUSTOMER</span>
                        </div>
                        <p class="text-[10px] text-[#8C7A6B] truncate">{{ Auth::user()->email }}</p>
                        <p class="text-[10px] text-[#A89F96] mt-0.5">ID: {{ Auth::user()->id }}</p>
                    </div>
                    @else
                    <div class="flex-1 overflow-hidden">
                        <h4 class="text-xs font-bold text-[#2D2621]">Guest</h4>
                        <p class="text-[10px] text-[#8C7A6B]">Belum login</p>
                    </div>
                    @endauth
                </div>

                {{-- Info Rows --}}
                <div class="space-y-3 mb-6 px-1">
                    <div class="flex items-center justify-between border-b border-[#F5EFE6] pb-3">
                        <div class="flex items-center gap-2">
                            <span class="text-orange-300">📦</span>
                            <span class="text-[11px] font-semibold text-[#6D5F53]">Status Keranjang Belanja</span>
                        </div>
                        <span class="text-[11px] font-bold text-[#2D2621]" id="modalCartStatus">Kosong</span>
                    </div>
                </div>

                {{-- Action Button --}}
                @auth
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full py-3 bg-[#FFF5F3] hover:bg-[#FFEAE5] text-[#D7344D] text-[11px] font-bold rounded-2xl transition flex items-center justify-center gap-2 border border-[#FFD2CC]">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar Dari Akun
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="w-full py-3 bg-[#EA6A47] hover:bg-[#D55B39] text-white text-[11px] font-bold rounded-2xl transition flex items-center justify-center gap-2 shadow-sm text-center">
                    Masuk Sekarang
                </a>
                @endauth
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    function claimPromo() {
        alert("🎉 YAY! Voucher New Year Sale Rp 100.000 berhasil diklaim!\nVoucher otomatis diterapkan saat Anda melakukan checkout.");
    }

    // Shopping Cart local storage
    let cart = JSON.parse(localStorage.getItem('maribaca_cart') || '[]');

    function updateCart() {
        localStorage.setItem('maribaca_cart', JSON.stringify(cart));
        const totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
        const badge = document.getElementById('cartBadgeCount');
        if (badge) {
            badge.textContent = totalCount;
            totalCount > 0 ? badge.classList.remove('hidden') : badge.classList.add('hidden');
        }
        const cartList = document.getElementById('cartList');
        const footer = document.getElementById('cartFooter');
        if (!cartList) return;
        if (cart.length === 0) {
            cartList.innerHTML = `<div class="text-center py-16 space-y-2 text-[#6D5F53]"><p class="text-3xl">🛒</p><p class="font-bold text-xs">Keranjang Anda masih kosong</p><p class="text-[11px] text-gray-400">Silakan pilih buku di katalog perkuliahan.</p></div>`;
            if (footer) footer.classList.add('hidden');
        } else {
            let html = '<div class="space-y-3 divide-y divide-[#FAF6F0]">';
            let subtotal = 0;
            cart.forEach(item => {
                const priceFormatted = parseInt(item.price).toLocaleString('id-ID');
                subtotal += parseInt(item.price) * item.qty;
                html += `<div class="pt-3 flex justify-between gap-3 text-xs"><div class="flex gap-2 w-full"><div class="w-8 h-10 rounded shadow-xs shrink-0" style="background: ${item.color}"></div><div class="min-w-0"><p class="font-bold text-[#2D2621] truncate">${item.title}</p><p class="font-bold text-[#EA6A47] mt-0.5">Rp ${priceFormatted}</p></div></div><div class="flex flex-col items-end gap-1.5 shrink-0"><div class="flex items-center gap-1.5 border border-[#EBE3D5] rounded-lg p-0.5 bg-[#FAF6F0]"><button onclick="changeQty('${item.id}', -1)" class="w-5 h-5 hover:bg-white rounded text-[#EA6A47] font-bold">－</button><span class="font-mono font-bold px-1 text-xs text-[#2D2621]">${item.qty}</span><button onclick="changeQty('${item.id}', 1)" class="w-5 h-5 hover:bg-white rounded text-[#EA6A47] font-bold">＋</button></div><button onclick="removeFromCart('${item.id}')" class="text-rose-500 hover:text-rose-700 text-[10px] font-semibold">Hapus</button></div></div>`;
            });
            html += '</div>';
            cartList.innerHTML = html;
            document.getElementById('cartTotalItems').textContent = totalCount + " pcs";
            document.getElementById('cartSubtotal').textContent = "Rp " + subtotal.toLocaleString('id-ID');
            if (footer) footer.classList.remove('hidden');
        }
    }

    function addToCart(id, title, price, color) {
        const existing = cart.find(item => item.id === id);
        if (existing) { existing.qty += 1; } else { cart.push({ id, title, price, color, qty: 1 }); }
        updateCart();
        alert('Berhasil memasukkan "' + title + '" ke Keranjang Belanja!');
    }

    function changeQty(id, delta) {
        const item = cart.find(item => item.id === id);
        if (!item) return;
        item.qty += delta;
        if (item.qty <= 0) { cart = cart.filter(item => item.id !== id); }
        updateCart();
    }

    function removeFromCart(id) { cart = cart.filter(item => item.id !== id); updateCart(); }

    function toggleCartDrawer(open) {
        const drawer = document.getElementById('cartDrawer');
        const content = document.getElementById('cartContent');
        if (!drawer || !content) return;
        if (open) {
            drawer.classList.remove('hidden'); drawer.classList.add('flex');
            setTimeout(() => { content.classList.remove('translate-x-full'); content.classList.add('translate-x-0'); }, 10);
        } else {
            content.classList.add('translate-x-full'); content.classList.remove('translate-x-0');
            setTimeout(() => { drawer.classList.remove('flex'); drawer.classList.add('hidden'); }, 300);
        }
    }

    function completeCheckoutSimulation() {
        alert('Checkout Berhasil! Terima kasih telah berbelanja di Mari Baca! 📚');
        cart = []; updateCart(); toggleCartDrawer(false);
    }

    function openBookDetail(title, author, desc, price, publisher, year, stock, color, image, category) {
        document.getElementById('detailTitle').textContent = title;
        document.getElementById('detailAuthor').textContent = "Oleh " + author;
        document.getElementById('detailDesc').textContent = desc;
        document.getElementById('detailPublisher').textContent = publisher + " (" + year + ")";
        document.getElementById('detailStock').textContent = stock + " pcs";
        document.getElementById('detailPrice').textContent = "Rp " + parseInt(price).toLocaleString('id-ID');
        document.getElementById('detailCategory').textContent = category;
        document.getElementById('modalHeader').style.background = color;
        const coverImageEl = document.getElementById('detailCoverImage');
        if (image && image !== '') { coverImageEl.src = image; coverImageEl.classList.remove('hidden'); } else { coverImageEl.classList.add('hidden'); }
        toggleDetailModal(true);
    }

    function toggleDetailModal(open) {
        const modal = document.getElementById('detailModal');
        const content = document.getElementById('detailContent');
        if (!modal || !content) return;
        if (open) {
            modal.classList.remove('hidden'); modal.classList.add('flex');
            setTimeout(() => { content.classList.remove('scale-95', 'opacity-0'); content.classList.add('scale-100', 'opacity-100'); }, 10);
        } else {
            content.classList.remove('scale-100', 'opacity-100'); content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => { modal.classList.remove('flex'); modal.classList.add('hidden'); }, 200);
        }
    }

    function toggleProfileModal(open) {
        const modal = document.getElementById('profileModal');
        const content = document.getElementById('profileContent');
        if (!modal || !content) return;
        
        if (open) {
            const cartStatus = document.getElementById('modalCartStatus');
            if (cartStatus) {
                cartStatus.textContent = cart.length > 0 ? cart.length + ' Item' : 'Kosong';
            }
            modal.classList.remove('hidden'); modal.classList.add('flex');
            setTimeout(() => { 
                modal.classList.remove('opacity-0'); 
                content.classList.remove('scale-95', 'opacity-0'); 
                content.classList.add('scale-100', 'opacity-100'); 
            }, 10);
        } else {
            content.classList.remove('scale-100', 'opacity-100'); 
            content.classList.add('scale-95', 'opacity-0');
            modal.classList.add('opacity-0');
            setTimeout(() => { 
                modal.classList.remove('flex'); 
                modal.classList.add('hidden'); 
            }, 300);
        }
    }

    window.addEventListener('load', () => { updateCart(); });

    // Restore scroll position setelah hapus buku
    window.addEventListener('load', () => {
        const savedY = sessionStorage.getItem('scrollY');
        if (savedY !== null) {
            window.scrollTo({ top: parseInt(savedY), behavior: 'instant' });
            sessionStorage.removeItem('scrollY');
        }
    });
</script>
@endpush
@endsection
