<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCT Admin — @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_nct.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        :root {
            --neon: #A1D233;
            --neon-dim: #8BBF1F;
            --neon-glow: rgba(161, 210, 51, 0.12);
            --neon-text: #4B6E00; /* Aksen hijau tua agar teks terbaca di warna terang */
            --dark: #F3F4F6; /* Background abu-abu muda bersih (gray-100) */
            --panel: #FFFFFF; /* Sidebar/Header putih */
            --card: #FFFFFF; /* Card/Tabel putih */
            --border: #E5E7EB; /* Border abu-abu tipis (gray-200) */
            --text: #1F2937; /* Teks abu-abu gelap (gray-800) */
            --muted: #4B5563; /* Teks pudar (gray-600) */
        }
        * { box-sizing: border-box; }
        body { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background: var(--dark); color: var(--text); }
        h1,h2,h3,h4,h5 { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }

        /* Sidebar */
        #sidebar { transition: transform 0.3s ease; }
        .nav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 10px;
            color: var(--muted); font-weight: 500; font-size: 0.875rem;
            transition: all 0.2s;
        }
        .nav-link:hover { background: var(--neon-glow); color: var(--neon-text); }
        .nav-link.active { background: var(--neon-glow); color: var(--neon-text); border-left: 3px solid var(--neon); }
        .nav-link svg { width: 18px; height: 18px; flex-shrink: 0; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--panel); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 10px; }

        /* Overlay */
        #overlay { transition: opacity 0.3s; }
    </style>
</head>
<body class="min-h-screen flex">

    <!-- Overlay (mobile) -->
    <div id="overlay" class="fixed inset-0 bg-black/60 z-30 hidden opacity-0 lg:hidden" onclick="closeSidebar()"></div>

    <!-- ===== SIDEBAR ===== -->
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-60 flex flex-col z-40 border-r"
           style="background:var(--panel); border-color:var(--border); transform: translateX(-100%);">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-5 py-5 border-b" style="border-color:var(--border);">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 overflow-hidden" style="background:var(--neon-glow); border:1px solid var(--border);">
                <img src="{{ asset('img/logo_nct.png') }}" class="w-full h-full object-cover rounded-xl">
            </div>
            <div>
                <p class="font-bold text-sm leading-tight" style="color:var(--neon); font-family:'Syne',sans-serif;">NCT Admin</p>
                <p class="text-xs" style="color:var(--muted);">Management Portal</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
            <p class="text-xs font-bold uppercase tracking-widest px-3 mb-3" style="color:var(--muted);">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 13a1 1 0 011-1h4a1 1 0 011 1v6a1 1 0 01-1 1h-4a1 1 0 01-1-1v-6z"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Manajemen Pengguna
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Manajemen Berita
            </a>
        </nav>

        <!-- User & Logout -->
        <div class="px-3 py-4 border-t" style="border-color:var(--border);">
            <div class="flex items-center gap-3 px-3 py-3 rounded-xl mb-2" style="background:var(--dark);">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0" style="background:var(--neon); color:#000;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs truncate" style="color:var(--muted);">{{ auth()->user()->role ?? 'Admin' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-full text-left" style="color:#f87171;">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="flex-1 flex flex-col min-h-screen lg:ml-60" style="background:var(--dark);">

        <!-- Topbar -->
        <header class="sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6 py-4 border-b" style="background:var(--panel); border-color:var(--border);">
            <div class="flex items-center gap-3">
                <!-- Hamburger -->
                <button onclick="toggleSidebar()" class="p-2 rounded-lg lg:hidden hover:opacity-80 transition" style="background:var(--card);">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--neon);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest" style="color:var(--muted);">NCT Admin</p>
                    <h1 class="text-base sm:text-lg font-bold leading-tight" style="font-family:'Syne',sans-serif;">@yield('title')</h1>
                </div>
            </div>
            <a href="/" target="_blank" class="text-xs font-semibold px-3 py-2 rounded-lg transition" style="background:var(--neon-glow); color:var(--neon); border:1px solid var(--border);">
                ↗ Lihat Website
            </a>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-4 sm:p-6">
            @if(session('success'))
            <div class="mb-4 px-4 py-3 rounded-xl text-sm font-semibold" style="background:var(--neon-glow); color:var(--neon); border:1px solid var(--border);">
                ✓ {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mb-4 px-4 py-3 rounded-xl text-sm font-semibold" style="background:rgba(248,113,113,0.1); color:#f87171; border:1px solid rgba(248,113,113,0.2);">
                ✕ {{ session('error') }}
            </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script>
        // Sidebar open by default on desktop
        function initSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth >= 1024) {
                sidebar.style.transform = 'translateX(0)';
            } else {
                sidebar.style.transform = 'translateX(-100%)';
            }
        }
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const isOpen = sidebar.style.transform === 'translateX(0px)' || sidebar.style.transform === 'translateX(0)';
            if (isOpen) {
                sidebar.style.transform = 'translateX(-100%)';
                overlay.classList.add('hidden'); overlay.style.opacity = 0;
            } else {
                sidebar.style.transform = 'translateX(0)';
                overlay.classList.remove('hidden'); overlay.style.opacity = 1;
            }
        }
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.style.transform = 'translateX(-100%)';
            overlay.classList.add('hidden'); overlay.style.opacity = 0;
        }
        window.addEventListener('resize', initSidebar);
        initSidebar();
    </script>
    @stack('scripts')
</body>
</html>