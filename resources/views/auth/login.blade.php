@extends('layouts.app')

@section('title', 'Masuk — Mari Baca')

@push('styles')
<style>
    /* ── Floating book animation ── */
    @keyframes floatBook {
        0%, 100% { transform: translateY(0px) rotate(-4deg); }
        50%       { transform: translateY(-14px) rotate(-4deg); }
    }
    @keyframes floatBook2 {
        0%, 100% { transform: translateY(0px) rotate(6deg); }
        50%       { transform: translateY(-10px) rotate(6deg); }
    }
    @keyframes floatBook3 {
        0%, 100% { transform: translateY(0px) rotate(-2deg); }
        50%       { transform: translateY(-18px) rotate(-2deg); }
    }
    @keyframes sparkle {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%       { opacity: 0.4; transform: scale(0.6); }
    }
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(40px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes ripple {
        0%   { transform: scale(0); opacity: 0.6; }
        100% { transform: scale(4); opacity: 0; }
    }
    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50%       { background-position: 100% 50%; }
    }
    @keyframes orb-pulse {
        0%, 100% { transform: scale(1); opacity: 0.25; }
        50%       { transform: scale(1.15); opacity: 0.4; }
    }

    .book-1 { animation: floatBook  4s ease-in-out infinite; }
    .book-2 { animation: floatBook2 5s ease-in-out infinite 0.8s; }
    .book-3 { animation: floatBook3 3.5s ease-in-out infinite 1.4s; }

    .sparkle-1 { animation: sparkle 2s ease-in-out infinite; }
    .sparkle-2 { animation: sparkle 2.5s ease-in-out infinite 0.5s; }
    .sparkle-3 { animation: sparkle 1.8s ease-in-out infinite 1s; }

    .panel-left  { animation: slideInLeft  0.7s cubic-bezier(.22,1,.36,1) both; }
    .panel-right { animation: slideInRight 0.7s cubic-bezier(.22,1,.36,1) 0.1s both; }

    .quote-item { animation: fadeInUp 0.6s ease both; }
    .quote-item:nth-child(2) { animation-delay: 0.15s; }
    .quote-item:nth-child(3) { animation-delay: 0.30s; }

    .orb { animation: orb-pulse 6s ease-in-out infinite; }
    .orb-2 { animation: orb-pulse 8s ease-in-out infinite 2s; }

    .input-field {
        transition: border-color 0.25s, box-shadow 0.25s, transform 0.2s;
    }
    .input-field:focus {
        border-color: #EA6A47;
        box-shadow: 0 0 0 3px rgba(234,106,71,0.15);
        transform: translateY(-1px);
        outline: none;
    }
    .btn-login {
        background: linear-gradient(135deg, #EA6A47 0%, #d6522f 100%);
        background-size: 200% 200%;
        animation: gradientShift 4s ease infinite;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
        overflow: hidden;
    }
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(234,106,71,0.45);
    }
    .btn-login:active { transform: translateY(0); }

    /* ripple effect */
    .btn-login .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.35);
        pointer-events: none;
        animation: ripple 0.6s linear forwards;
    }

    /* toggle password icon */
    .toggle-pw { cursor: pointer; transition: color 0.2s; }
    .toggle-pw:hover { color: #EA6A47; }

    /* Checkbox custom style */
    input[type="checkbox"]:checked {
        accent-color: #EA6A47;
    }

    /* left panel gradient */
    .left-panel-bg {
        background: linear-gradient(155deg, #f07043 0%, #EA6A47 40%, #bf360c 100%);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FDF6EE] via-[#FAF6F0] to-[#F5EDE0] flex items-center justify-center p-4">
    <div class="max-w-4xl w-full mx-auto grid grid-cols-1 md:grid-cols-12 bg-white rounded-3xl overflow-hidden shadow-2xl my-6 border border-[#EBE3D5]/60">

        {{-- ════════════ LEFT PANEL ════════════ --}}
        <div class="md:col-span-5 left-panel-bg p-8 md:p-10 text-white flex flex-col justify-between relative panel-left overflow-hidden">

            {{-- Decorative Orbs --}}
            <div class="orb   absolute top-[-40px] right-[-40px] w-52 h-52 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="orb-2 absolute bottom-[-30px] left-[-30px] w-44 h-44 bg-yellow-300/15 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-orange-300/10 rounded-full blur-3xl pointer-events-none"></div>

            {{-- ── TOP: Brand + Quote ── --}}
            <div class="relative z-10 space-y-6">
                {{-- Logo mark --}}
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-lg shadow">
                        📖
                    </div>
                    <span class="font-black text-xl tracking-tight heading-font">Mari Baca</span>
                </div>

                {{-- Headline --}}
                <div class="space-y-2">
                    <h2 class="text-2xl md:text-[28px] font-extrabold leading-snug heading-font">
                        Temukan Buku<br>yang Mengubah<br>Hidupmu.
                    </h2>
                    <p class="text-orange-100 text-sm font-light leading-relaxed">
                        Ribuan judul pilihan menunggu Anda. Mulai petualangan membaca hari ini bersama <span class="font-semibold text-white">Mari Baca</span>.
                    </p>
                </div>

                {{-- Quotes / Feature pills --}}
                <div class="space-y-2 pt-1">
                    <div class="quote-item flex items-center gap-3 bg-white/10 border border-white/20 rounded-2xl px-4 py-3 backdrop-blur-sm">
                        <span class="text-xl sparkle-1">📚</span>
                        <div>
                            <p class="text-xs font-bold leading-none">Koleksi Lengkap</p>
                            <p class="text-[10px] text-orange-200 mt-0.5">Fiksi, sains, bisnis, hingga self-help</p>
                        </div>
                    </div>
                    <div class="quote-item flex items-center gap-3 bg-white/10 border border-white/20 rounded-2xl px-4 py-3 backdrop-blur-sm">
                        <span class="text-xl sparkle-2">✨</span>
                        <div>
                            <p class="text-xs font-bold leading-none">Kurator Terpercaya</p>
                            <p class="text-[10px] text-orange-200 mt-0.5">Setiap buku dipilih dengan cermat</p>
                        </div>
                    </div>
                    <div class="quote-item flex items-center gap-3 bg-white/10 border border-white/20 rounded-2xl px-4 py-3 backdrop-blur-sm">
                        <span class="text-xl sparkle-3">🚀</span>
                        <div>
                            <p class="text-xs font-bold leading-none">Pengiriman Cepat</p>
                            <p class="text-[10px] text-orange-200 mt-0.5">Sampai ke tanganmu dalam hitungan hari</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── BOTTOM: Floating Books Illustration ── --}}
            <div class="relative z-10 mt-8 flex justify-center items-end gap-4 h-24 select-none">
                {{-- Book 1 --}}
                <div class="book-1 w-12 h-16 rounded-r-md rounded-l-sm shadow-lg flex items-center justify-center text-2xl"
                     style="background: linear-gradient(160deg,#fff3e0,#ffe0b2); border-left: 5px solid #bf360c;">
                    📗
                </div>
                {{-- Book 2 (taller) --}}
                <div class="book-2 w-14 h-20 rounded-r-md rounded-l-sm shadow-lg flex items-center justify-center text-2xl"
                     style="background: linear-gradient(160deg,#fce4ec,#f8bbd0); border-left: 5px solid #880e4f;">
                    📘
                </div>
                {{-- Book 3 --}}
                <div class="book-3 w-11 h-14 rounded-r-md rounded-l-sm shadow-lg flex items-center justify-center text-xl"
                     style="background: linear-gradient(160deg,#e8f5e9,#c8e6c9); border-left: 5px solid #1b5e20;">
                    📕
                </div>
                {{-- Sparkles --}}
                <span class="sparkle-1 absolute top-0 left-8 text-yellow-300 text-xs">✦</span>
                <span class="sparkle-2 absolute top-3 right-6 text-white/60 text-[10px]">✦</span>
                <span class="sparkle-3 absolute bottom-2 left-1/2 text-orange-200 text-xs">✦</span>
            </div>
        </div>

        {{-- ════════════ RIGHT PANEL ════════════ --}}
        <div class="md:col-span-7 p-8 md:p-12 flex flex-col justify-center space-y-6 panel-right">

            {{-- Header --}}
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-[#EA6A47] uppercase tracking-widest mb-1">Selamat Datang</p>
                    <h3 class="text-2xl font-extrabold text-[#2D2621] heading-font">Masuk ke Mari Baca</h3>
                    <p class="text-xs text-[#9D8E85] mt-1">Masuk dan lanjutkan petualangan membacamu 📖</p>
                </div>
                <a href="{{ route('register') }}"
                   class="text-xs font-bold text-[#EA6A47] hover:text-[#d4502b] transition flex items-center gap-1 mt-1 whitespace-nowrap">
                    Daftar <span class="text-base">→</span>
                </a>
            </div>

            {{-- Alerts --}}
            @if ($errors->any())
                <div id="alert-error" class="p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-2xl flex gap-2 items-start">
                    <span class="text-base">⚠️</span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-2xl flex gap-2 items-start">
                    <span class="text-base">✅</span>
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-4" id="loginForm">
                @csrf

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="text-[11px] font-bold text-[#6D5F53] uppercase tracking-wider">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-base pointer-events-none">📧</span>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="input-field w-full pl-10 pr-4 py-3 text-sm border border-[#EBE3D5] rounded-2xl bg-[#FDFAF7] text-[#2D2621] placeholder-[#C4B8B0] @error('email') border-red-400 bg-red-50 @enderror"
                            placeholder="contoh@maribaca.com"
                        />
                    </div>
                </div>

                {{-- Password --}}
                <div class="space-y-1.5">
                    <label for="password" class="text-[11px] font-bold text-[#6D5F53] uppercase tracking-wider">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400 text-base pointer-events-none">🔒</span>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="input-field w-full pl-10 pr-12 py-3 text-sm border border-[#EBE3D5] rounded-2xl bg-[#FDFAF7] text-[#2D2621] placeholder-[#C4B8B0]"
                            placeholder="Masukkan password kamu"
                        />
                        {{-- Show/Hide toggle --}}
                        <button type="button" id="togglePw"
                            class="toggle-pw absolute inset-y-0 right-0 flex items-center pr-3.5 text-gray-400 text-base">
                            👁️
                        </button>
                    </div>
                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input id="remember_me" type="checkbox" name="remember"
                               class="w-4 h-4 rounded border-[#EBE3D5] accent-[#EA6A47] cursor-pointer">
                        <span class="text-xs text-[#6D5F53]">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-xs text-[#EA6A47] hover:text-[#d4502b] font-semibold transition">
                            Lupa password?
                        </a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" id="loginBtn"
                        class="btn-login w-full py-3.5 text-white text-sm font-bold rounded-2xl flex items-center justify-center gap-2 cursor-pointer">
                    <span id="btnIcon">🚀</span>
                    <span id="btnText">Masuk Sekarang</span>
                </button>
            </form>

            {{-- Divider --}}
            <div class="flex items-center gap-3">
                <div class="flex-1 h-px bg-[#F0E8DE]"></div>
                <span class="text-[10px] text-[#C4B8B0] font-medium">atau</span>
                <div class="flex-1 h-px bg-[#F0E8DE]"></div>
            </div>

            {{-- Register CTA --}}
            <p class="text-center text-xs text-[#9D8E85]">
                Belum punya akun?
                <a href="{{ route('register') }}"
                   class="font-bold text-[#EA6A47] hover:text-[#d4502b] transition underline underline-offset-2">
                    Daftar gratis sekarang
                </a>
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    // ── Toggle show/hide password ──
    const togglePw  = document.getElementById('togglePw');
    const pwInput   = document.getElementById('password');

    togglePw.addEventListener('click', () => {
        const isHidden = pwInput.type === 'password';
        pwInput.type   = isHidden ? 'text' : 'password';
        togglePw.textContent = isHidden ? '🙈' : '👁️';
    });

    // ── Ripple effect on login button ──
    const loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', function(e) {
        const rect   = this.getBoundingClientRect();
        const x      = e.clientX - rect.left;
        const y      = e.clientY - rect.top;
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        ripple.style.cssText = `width:40px;height:40px;left:${x - 20}px;top:${y - 20}px;`;
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    });

    // ── Loading state on form submit ──
    const loginForm = document.getElementById('loginForm');
    const btnIcon   = document.getElementById('btnIcon');
    const btnText   = document.getElementById('btnText');

    loginForm.addEventListener('submit', () => {
        loginBtn.disabled      = true;
        loginBtn.style.opacity = '0.8';
        btnIcon.textContent    = '⏳';
        btnText.textContent    = 'Sedang Masuk…';
    });

    // ── Live input validation styling ──
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('input', () => {
        const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        emailInput.style.borderColor = emailInput.value
            ? (valid ? '#22c55e' : '#ef4444')
            : '';
    });
});
</script>
@endpush
