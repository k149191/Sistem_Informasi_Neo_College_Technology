<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo College Technology</title>
    <meta name="description" content="Neo College Technology — Membangun masa depan melalui inovasi teknologi dan kolaborasi kreatif untuk generasi digital unggul.">
    <link rel="icon" type="image/png" href="/img/logo_nct.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        html, body { overflow-x: hidden; max-width: 100vw; }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex justify-between items-center">

            <a href="/" class="flex items-center space-x-2 min-w-0">
                <img src="{{ asset('img/logo_nct.png') }}" class="w-8 h-8 sm:w-10 sm:h-10 flex-shrink-0 object-cover rounded-full">
                <span class="font-bold text-gray-900 text-xs sm:text-base truncate">
                    Neo College Technology
                </span>
            </a>

            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <div class="flex space-x-6 lg:space-x-8 font-medium text-gray-700">
                    <a href="#tentang" class="hover:text-[#A1D233] transition-colors">Tentang NCT</a>
                    <a href="#berita" class="hover:text-[#A1D233] transition-colors">Berita</a>
                    <a href="#kontak" class="hover:text-[#A1D233] transition-colors">Kontak</a>
                </div>

                <a href="{{ route('login') }}"
                class="bg-[#A1D233] text-black px-5 py-2 rounded-full font-medium hover:bg-[#8dbb2a] transition">
                    Login
                </a>
            </div>

            <button id="menu-btn" class="md:hidden text-gray-800 focus:outline-none p-1" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white px-4 py-4 space-y-3 shadow-lg border-t border-gray-100">
            <a href="#tentang" class="block py-2 hover:text-[#A1D233] font-medium transition-colors">
                Tentang NCT
            </a>

            <a href="#berita" class="block py-2 hover:text-[#A1D233] font-medium transition-colors">
                Berita
            </a>

            <a href="#kontak" class="block py-2 hover:text-[#A1D233] font-medium transition-colors">
                Kontak
            </a>

            <a href="{{ route('login') }}"
            class="block text-center bg-[#A1D233] text-black py-2 rounded-full font-medium hover:bg-[#8dbb2a] transition">
                Login
            </a>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => { menu.classList.add('hidden'); });
        });
    </script>

    <section class="relative min-h-[85vh] sm:min-h-screen flex items-center justify-center text-white overflow-hidden">
        <img src="{{ asset('img/hero_bg.jpg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover z-0">
        <div class="absolute inset-0 bg-black/65 z-10"></div>

        <div class="relative z-20 text-center px-5 sm:px-6 max-w-4xl mx-auto">
            <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-3 sm:mb-6 leading-tight">
                NEO COLLEGE TECHNOLOGY
            </h1>
            <p class="text-sm sm:text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                Membangun masa depan melalui inovasi teknologi dan kolaborasi kreatif untuk generasi digital unggul.
            </p>
            <div class="mt-5 sm:mt-8">
                <a href="#tentang" class="inline-block bg-[#A1D233] hover:bg-[#8cb82c] text-black font-bold py-2.5 px-5 sm:py-3 sm:px-8 rounded-full transition duration-300 text-sm sm:text-base">
                    Mulai Eksplorasi
                </a>
            </div>
        </div>
    </section>


    <section id="tentang" class="py-12 sm:py-20 px-4 sm:px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-6 lg:gap-12">

            <div class="w-full lg:w-1/3 space-y-4 sm:space-y-5">
                <h2 class="text-2xl sm:text-4xl font-bold text-gray-900 mb-4 sm:mb-8">Tentang NCT</h2>

                <div class="bg-white p-5 sm:p-8 rounded-2xl sm:rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-[#A1D233] mb-2">Visi</h3>
                    <p class="text-gray-600 mb-4 sm:mb-5 text-sm sm:text-base">Menjadi pusat keunggulan teknologi digital yang inovatif dan berdaya saing global.</p>

                    <h3 class="font-bold text-[#A1D233] mb-2">Misi</h3>
                    <ul class="text-gray-600 space-y-2 list-disc list-inside text-sm sm:text-base">
                        <li>Mengembangkan riset teknologi terapan.</li>
                        <li>Membangun kolaborasi industri kreatif.</li>
                        <li>Mencetak lulusan siap kerja digital.</li>
                    </ul>
                </div>

                <div class="bg-white p-5 sm:p-8 rounded-2xl sm:rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-[#A1D233] mb-3">Tujuan NCT</h3>
                    <ul class="text-gray-600 space-y-2 list-none text-sm">
                        <li class="flex items-start">
                            <span class="mr-2 text-[#A1D233] flex-shrink-0">•</span>
                            Menyelenggarakan pendidikan teknologi yang relevan.
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-[#A1D233] flex-shrink-0">•</span>
                            Menghasilkan inovasi berbasis teknologi.
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-[#A1D233] flex-shrink-0">•</span>
                            Membangun ekosistem belajar kolaboratif.
                        </li>
                    </ul>
                </div>

                <a href="https://maps.app.goo.gl/dFqS2GuvRpMAKz8G7" target="_blank"
                   class="block bg-white p-5 sm:p-8 rounded-2xl sm:rounded-3xl shadow-sm border border-gray-100 hover:border-[#A1D233] transition-all duration-300">
                    <h4 class="text-xs font-bold text-[#A1D233] uppercase tracking-widest mb-3">Lokasi Kampus</h4>
                    <div class="flex items-start text-gray-700 text-sm sm:text-base font-medium">
                        <svg class="w-5 h-5 text-[#A1D233] mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="break-words">Neo College Technology, SM Entertainment Indonesia, FX Sudirman, Jl. Jenderal Sudirman No.1/3, RT.1/RW.3, Gelora, Tanah Abang, Central Jakarta City, Jakarta 10270, Indonesia</p>
                    </div>
                </a>
            </div>

            <div class="w-full lg:w-2/3">
                <h2 class="text-2xl sm:text-4xl font-bold mb-6 sm:mb-12 text-gray-900">Struktur Organisasi</h2>

                @if($rektor)
                <div class="mb-6 sm:mb-12">
                    <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3 sm:gap-6">
                        <img src="{{ asset($rektor->profil_img) }}" class="w-14 h-14 sm:w-20 sm:h-20 flex-shrink-0 rounded-full object-cover border-4 border-[#A1D233]">
                        <div class="min-w-0">
                            <h3 class="text-base sm:text-xl font-bold truncate">{{ $rektor->name }}</h3>
                            <span class="text-[#A1D233] font-bold uppercase text-xs tracking-widest">Rektor NCT</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-6">
                    @foreach($departments as $dept)
                    <a href="{{ route('department.show', $dept->slug) }}" class="bg-white p-4 sm:p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-[#A1D233] transition group">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#A1D233]/10 flex items-center justify-center rounded-xl mb-2 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#A1D233]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-sm sm:text-lg mb-1 group-hover:text-[#A1D233] transition-colors">{{ $dept->name }}</h3>
                        <p class="text-gray-500 text-xs sm:text-sm truncate">{{ $dept->description }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section id="berita" class="py-12 sm:py-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-4xl font-bold mb-5 sm:mb-8 text-gray-900">Sorotan Utama</h2>

            <div class="swiper mySwiper w-full h-[200px] sm:h-[340px] md:h-[400px] rounded-2xl sm:rounded-3xl overflow-hidden mb-8 sm:mb-12 shadow-lg">
                <div class="swiper-wrapper">
                    @foreach($carouselNews as $news)
                    <div class="swiper-slide relative">
                        <a href="{{ route('news.show', $news->slug) }}" class="block w-full h-full">
                            <img src="{{ asset($news->image) }}" class="w-full h-full object-cover" alt="{{ $news->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-0 p-4 sm:p-8 md:p-10 text-white">
                                <span class="bg-[#A1D233] text-gray-900 text-[10px] sm:text-xs font-bold px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full mb-2 sm:mb-3 inline-block">HOT NEWS</span>
                                <h3 class="text-base sm:text-2xl md:text-3xl font-bold mb-1 sm:mb-2" style="overflow:hidden;display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;">{{ $news->title }}</h3>
                                <p class="text-white/90 text-sm sm:text-base md:text-lg hidden sm:block" style="overflow:hidden;display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;">{{ $news->content }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <h2 class="text-lg sm:text-2xl font-bold mt-8 sm:mt-12 mb-5 sm:mb-8 text-gray-900">Berita Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 sm:gap-8">
                @foreach($latestNews as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="group cursor-pointer block">
                    <div class="w-full h-40 sm:h-48 bg-gray-200 rounded-xl sm:rounded-2xl mb-3 sm:mb-4 overflow-hidden">
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h4 class="font-bold text-sm sm:text-lg group-hover:text-[#A1D233] transition-colors line-clamp-2">{{ $news->title }}</h4>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1 sm:mt-2">
                        {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
                    </p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-gray-900 text-white py-12 sm:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-xl sm:text-3xl font-bold mb-3 sm:mb-6">Hubungi Kami</h2>
            <p class="text-gray-400 mb-5 sm:mb-8 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                Untuk informasi lebih lanjut mengenai NCT atau pertanyaan terkait sistem operasional, silakan hubungi tim administrasi kami.
            </p>
            <div class="inline-block bg-white/10 rounded-full px-5 sm:px-8 py-2.5 sm:py-3 font-medium border border-white/20 text-sm sm:text-base break-all sm:break-normal">
                admin@nct-portal.com
            </div>
            <div class="mt-8 sm:mt-12 text-xs sm:text-sm text-gray-500 border-t border-white/10 pt-5 sm:pt-8">
                © 2026 NCT Management Portal. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
        });
    </script>

    <style>
        .swiper-pagination-bullet { background: white !important; opacity: 0.6; }
        .swiper-pagination-bullet-active { opacity: 1 !important; background: #A1D233 !important; }
    </style>

</body>
</html>