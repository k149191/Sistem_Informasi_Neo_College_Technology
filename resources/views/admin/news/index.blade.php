@extends('admin.layouts.admin')
@section('title', 'Manajemen Berita')

@section('content')
<div style="--neon:#A1D233;--neon-dim:#8BBF1F;--neon-glow:rgba(161,210,51,0.18);--dark:#0D0F0A;--panel:#141610;--card:#1A1D14;--border:rgba(161,210,51,0.15);--text:#E8F0D0;--muted:#6B7A55;">

    <!-- Header Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest mb-1" style="color:var(--muted);">Kelola</p>
            <h2 class="text-xl font-bold">Daftar Berita</h2>
        </div>
        <a href="{{ route('admin.news.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-semibold text-sm transition hover:opacity-90 flex-shrink-0"
           style="background:var(--neon); color:#000;">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Berita
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.news.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1 max-w-sm">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--muted);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita..."
                       class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm outline-none focus:ring-2"
                       style="background:var(--card); border:1px solid var(--border); color:var(--text);">
            </div>
            <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition hover:opacity-80" style="background:var(--neon-glow); color:var(--neon); border:1px solid var(--border);">
                Cari
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="rounded-2xl border overflow-hidden" style="background:var(--card); border-color:var(--border);">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b" style="border-color:var(--border); background:rgba(161,210,51,0.05);">
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider" style="color:var(--muted);">Berita</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden md:table-cell" style="color:var(--muted);">Penulis</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden sm:table-cell" style="color:var(--muted);">Tanggal</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden lg:table-cell" style="color:var(--muted);">Carousel</th>
                        <th class="text-right px-5 py-3.5 text-xs font-bold uppercase tracking-wider" style="color:var(--muted);">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color:var(--border);">
                    @forelse($news as $item)
                    <tr class="hover:opacity-80 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset($item->image) }}" class="w-12 h-10 rounded-lg object-cover flex-shrink-0" style="border:1px solid var(--border);">
                                <div class="min-w-0">
                                    <p class="font-semibold truncate max-w-[180px] sm:max-w-xs">{{ $item->title }}</p>
                                    <p class="text-xs sm:hidden" style="color:var(--muted);">{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 hidden md:table-cell" style="color:var(--muted);">{{ $item->author_name ?? 'Admin NCT' }}</td>
                        <td class="px-5 py-4 hidden sm:table-cell text-xs" style="color:var(--muted);">{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</td>
                        <td class="px-5 py-4 hidden lg:table-cell">
                            @if($item->is_carousel)
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold" style="background:var(--neon-glow); color:var(--neon);">Ya</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold" style="background:rgba(255,255,255,0.05); color:var(--muted);">Tidak</span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.news.edit', $item->news_id) }}"
                                   class="px-3 py-1.5 rounded-lg text-xs font-semibold transition hover:opacity-80"
                                   style="background:var(--neon-glow); color:var(--neon); border:1px solid var(--border);">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.news.destroy', $item->news_id) }}"
                                      onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg text-xs font-semibold transition hover:opacity-80"
                                            style="background:rgba(248,113,113,0.1); color:#f87171; border:1px solid rgba(248,113,113,0.2);">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-5 py-12 text-center" style="color:var(--muted);">
                            <svg class="w-10 h-10 mx-auto mb-2 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            Tidak ada berita ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="px-5 py-4 border-t flex justify-end" style="border-color:var(--border);">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</div>
@endsection