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
            --neon-soft: rgba(161, 210, 51, 0.12);
            --neon-text: #4B6E00;
            --bg: #F3F4F6;
            --panel: #FFFFFF;
            --border: #E5E7EB;
            --text: #1F2937;
            --muted: #6B7280;
        }

        * { box-sizing: border-box; }

        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        #sidebar {
            transition: transform 0.28s ease;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            color: var(--muted);
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            width: 100%;
        }

        .nav-link:hover {
            background: var(--neon-soft);
            color: var(--neon-text);
        }

        .nav-link.active {
            background: var(--neon-soft);
            color: var(--neon-text);
            border-left: 3px solid var(--neon);
        }

        .nav-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        #overlay {
            transition: opacity 0.25s ease;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--panel);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 999px;
        }
    </style>
</head>
<body class="min-h-screen">

    <div id="overlay"
         class="fixed inset-0 bg-black/50 z-30 hidden opacity-0 md:hidden"
         onclick="closeSidebar()"></div>

    <aside id="sidebar"
           class="fixed top-0 left-0 z-40 h-full w-64 bg-white border-r flex flex-col
                  -translate-x-full md:translate-x-0"
           style="border-color:var(--border);">

        <div class="flex items-center gap-3 px-5 py-5 border-b" style="border-color:var(--border);">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 overflow-hidden"
                 style="background:var(--neon-soft); border:1px solid var(--border);">
                <img src="{{ asset('img/logo_nct.png') }}" class="w-full h-full object-cover rounded-xl" alt="Logo NCT">
            </div>
            <div class="min-w-0">
                <p class="font-bold text-sm leading-tight truncate" style="color:var(--neon); font-family:'Syne',sans-serif;">
                    NCT Admin
                </p>
                <p class="text-xs truncate" style="color:var(--muted);">Management Portal</p>
            </div>
        </div>

        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
            <p class="text-xs font-bold uppercase tracking-widest px-3 mb-3" style="color:var(--muted);">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 13a1 1 0 011-1h4a1 1 0 011 1v6a1 1 0 01-1 1h-4a1 1 0 01-1-1v-6z"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Manajemen Pengguna
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                Manajemen Berita
            </a>
        </nav>

        <div class="mt-auto px-3 py-4 border-t" style="border-color:var(--border);">
            <div class="flex items-center gap-3 px-3 py-3 rounded-xl mb-3" style="background:#F9FAFB;">
                @php $user = auth()->user(); @endphp

                <div class="w-10 h-10 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 border overflow-hidden"
                     style="background:var(--neon); color:#000; border-color:var(--border);">
                    {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="text-sm font-semibold truncate">{{ $user->name ?? 'Admin' }}</p>
                    <p class="text-xs truncate" style="color:var(--muted);">{{ $user->role ?? 'Admin' }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-left" style="color:#dc2626;">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="min-h-screen flex flex-col md:ml-64" style="background:var(--bg);">

        <header class="fixed top-0 left-0 md:left-64 right-0 z-50 border-b bg-white"
            style="border-color:var(--border);">
            <div class="px-4 sm:px-6 py-4 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <button onclick="toggleSidebar()"
                            class="p-2 rounded-lg md:hidden hover:opacity-80 transition flex-shrink-0"
                            style="background:#F9FAFB; border:1px solid var(--border);">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--neon-text);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <div class="min-w-0">
                        <p class="text-xs font-bold uppercase tracking-widest truncate" style="color:var(--muted);">
                            NCT Admin
                        </p>
                        <h1 class="text-sm sm:text-lg font-bold leading-tight truncate" style="font-family:'Syne',sans-serif;">
                            @yield('title')
                        </h1>
                    </div>
                </div>

                <a href="/"
                   target="_blank"
                   class="inline-flex items-center justify-center text-[11px] sm:text-sm font-semibold px-3 sm:px-4 py-2 rounded-lg transition hover:opacity-90 active:scale-[0.98] whitespace-nowrap shrink-0"
                   style="background:var(--neon); color:#000; border:1px solid var(--neon);">
                    <span class="hidden sm:inline">↗ Lihat Website</span>
                    <span class="sm:hidden">↗ Lihat Website</span>
                </a>
            </div>
        </header>

        <main class="flex-1 p-6 pt-24 overflow-x-hidden">
            @if(session('success'))
            <div class="mb-4 px-4 py-3 rounded-xl text-sm font-semibold"
                 style="background:var(--neon-soft); color:var(--neon-text); border:1px solid var(--border);">
                ✓ {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 px-4 py-3 rounded-xl text-sm font-semibold"
                 style="background:rgba(248,113,113,0.10); color:#dc2626; border:1px solid rgba(248,113,113,0.18);">
                ✕ {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        function initSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            if (window.innerWidth >= 768) {
                sidebar.style.transform = 'translateX(0)';
                overlay.classList.add('hidden');
                overlay.style.opacity = 0;
            } else {
                sidebar.style.transform = 'translateX(-100%)';
                overlay.classList.add('hidden');
                overlay.style.opacity = 0;
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const isOpen = sidebar.style.transform === 'translateX(0px)' || sidebar.style.transform === 'translateX(0)';

            if (isOpen) {
                closeSidebar();
            } else {
                sidebar.style.transform = 'translateX(0)';
                overlay.classList.remove('hidden');
                overlay.style.opacity = 1;
            }
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.style.transform = 'translateX(-100%)';
            overlay.classList.add('hidden');
            overlay.style.opacity = 0;
        }

        window.addEventListener('resize', initSidebar);
        document.addEventListener('DOMContentLoaded', initSidebar);

        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>