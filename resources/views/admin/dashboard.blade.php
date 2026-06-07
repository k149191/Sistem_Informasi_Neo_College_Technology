@extends('admin.layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div style="--neon:#A1D233;--neon-dim:#8BBF1F;--neon-glow:rgba(161,210,51,0.18);--dark:#0D0F0A;--panel:#141610;--card:#1A1D14;--border:rgba(161,210,51,0.15);--text:#E8F0D0;--muted:#6B7A55;">

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">

        @php
        $stats = [
            ['label' => 'Total Pengguna', 'value' => $totalUsers ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
            ['label' => 'Total Berita', 'value' => $totalNews ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>'],
            ['label' => 'Total Departemen', 'value' => $totalDepts ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'],
            ['label' => 'Total Dosen', 'value' => $totalLecturers ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>'],
        ];
        @endphp

        @foreach($stats as $stat)
        <div class="rounded-2xl p-4 sm:p-5 border" style="background:var(--card); border-color:var(--border);">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-semibold uppercase tracking-wider" style="color:var(--muted);">{{ $stat['label'] }}</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:var(--neon-glow);">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--neon-text);">{!! $stat['icon'] !!}</svg>
                </div>
            </div>
            <p class="text-2xl sm:text-3xl font-bold" style="color:var(--neon-text);">{{ $stat['value'] }}</p>
        </div>
        @endforeach
    </div>

    <!-- Middle Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">

        <!-- Berita Terbaru (2/3) -->
        <div class="lg:col-span-2 rounded-2xl border overflow-hidden" style="background:var(--card); border-color:var(--border);">
            <div class="flex items-center justify-between px-5 py-4 border-b" style="border-color:var(--border);">
                <h3 class="font-bold text-sm">Berita Terbaru</h3>
                <a href="{{ route('admin.news.index') }}" class="text-xs font-semibold" style="color:var(--neon-text);">Lihat semua →</a>
            </div>
            <div class="divide-y" style="border-color:var(--border);">
                @forelse($latestNews ?? [] as $news)
                <div class="flex items-center gap-4 px-5 py-3">
                    <img src="{{ asset($news->image) }}" class="w-10 h-10 rounded-lg object-cover flex-shrink-0" style="border:1px solid var(--border);">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate">{{ $news->title }}</p>
                        <p class="text-xs" style="color:var(--muted);">{{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</p>
                    </div>
                    <a href="{{ route('admin.news.edit', $news->news_id) }}" class="text-xs px-2 py-1 rounded-lg flex-shrink-0" style="background:var(--neon-glow); color:var(--neon-text);">Edit</a>
                </div>
                @empty
                <p class="px-5 py-8 text-sm text-center" style="color:var(--muted);">Belum ada berita.</p>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions (1/3) -->
        <div class="rounded-2xl border p-5" style="background:var(--card); border-color:var(--border);">
            <h3 class="font-bold text-sm mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.news.create') }}"
                   class="flex items-center gap-3 w-full px-4 py-3 rounded-xl font-semibold text-sm transition hover:opacity-90"
                   style="background:var(--neon); color:#000;">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Berita
                </a>
                <a href="{{ route('admin.users.create') }}"
                   class="flex items-center gap-3 w-full px-4 py-3 rounded-xl font-semibold text-sm transition border hover:opacity-80"
                   style="background:var(--neon-glow); color:var(--neon-text); border-color:var(--border);">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    Tambah Pengguna
                </a>
                <a href="/" target="_blank"
                   class="flex items-center gap-3 w-full px-4 py-3 rounded-xl font-semibold text-sm transition border hover:opacity-80"
                   style="color:var(--muted); border-color:var(--border);">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
            </div>

            <!-- Mini info -->
            <div class="mt-6 pt-5 border-t" style="border-color:var(--border);">
                <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color:var(--muted);">Info Sistem</p>
                <div class="space-y-2 text-xs" style="color:var(--muted);">
                    <div class="flex justify-between">
                        <span>Laravel</span>
                        <span style="color:var(--neon-text);">v10.x</span>
                    </div>
                    <div class="flex justify-between">
                        <span>PHP</span>
                        <span style="color:var(--neon-text);">8.1</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Status</span>
                        <span class="flex items-center gap-1" style="color:var(--neon-text);">
                            <span class="w-1.5 h-1.5 rounded-full inline-block" style="background:var(--neon);"></span> Online
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengguna Terbaru -->
    <div class="rounded-2xl border overflow-hidden" style="background:var(--card); border-color:var(--border);">
        <div class="flex items-center justify-between px-5 py-4 border-b" style="border-color:var(--border);">
            <h3 class="font-bold text-sm">Pengguna Terbaru</h3>
            <a href="{{ route('admin.users.index') }}" class="text-xs font-semibold" style="color:var(--neon-text);">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b" style="border-color:var(--border);">
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-wider" style="color:var(--muted);">Nama</th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-wider hidden sm:table-cell" style="color:var(--muted);">Email</th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-wider hidden md:table-cell" style="color:var(--muted);">Role</th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-wider hidden lg:table-cell" style="color:var(--muted);">Bergabung</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color:var(--border);">
                    @forelse($latestUsers ?? [] as $user)
                    <tr class="hover:opacity-80 transition">
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0" style="background:var(--neon-glow); color:var(--neon-text);">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="font-medium">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-5 py-3 hidden sm:table-cell" style="color:var(--muted);">{{ $user->email }}</td>
                        <td class="px-5 py-3 hidden md:table-cell">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold" style="background:var(--neon-glow); color:var(--neon-text);">{{ $user->role ?? 'User' }}</span>
                        </td>
                        <td class="px-5 py-3 hidden lg:table-cell text-xs" style="color:var(--muted);">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-5 py-8 text-center text-sm" style="color:var(--muted);">Belum ada pengguna.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection