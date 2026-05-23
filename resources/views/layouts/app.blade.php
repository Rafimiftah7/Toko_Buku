<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mari Baca') — Toko Buku Online</title>
    <meta name="description" content="Mari Baca — Temukan ribuan koleksi buku pilihan terbaik. Fiksi, sains, bisnis, self-help dan masih banyak lagi.">

    <!-- Google Fonts: Inter & Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Space Grotesk', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body { background-color: #FAF6F0; }
        .heading-font { font-family: 'Space Grotesk', sans-serif; }
        @keyframes subtle-swing {
            0%, 100% { transform: rotate(-3deg); transform-origin: top center; }
            50% { transform: rotate(3deg); transform-origin: top center; }
        }
        @keyframes heart-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes discount-glow {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 2px 4px rgba(234, 106, 71, 0.2)); }
            50% { transform: scale(1.03) translateY(-1px); filter: drop-shadow(0 4px 8px rgba(234, 106, 71, 0.4)); }
        }
        .animate-swing-slow { animation: subtle-swing 4s ease-in-out infinite; }
        .animate-discount { animation: discount-glow 2.2s cubic-bezier(0.4, 0, 0.2, 1) infinite; }
        .animate-pulse-price { animation: heart-pulse 1.8s ease-in-out infinite; }
        .scrollbar-none::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    @stack('styles')
</head>
<body class="leading-relaxed text-[#2D2621] font-sans antialiased">
    @yield('content')
    @stack('scripts')
</body>
</html>
