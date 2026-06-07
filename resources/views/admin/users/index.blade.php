@extends('admin.layouts.admin')
@section('title', 'Manajemen Pengguna')

@section('content')
<div style="--neon:#A1D233;--neon-dim:#8BBF1F;--neon-glow:rgba(161,210,51,0.18);--dark:#0D0F0A;--panel:#141610;--card:#1A1D14;--border:rgba(161,210,51,0.15);--text:#E8F0D0;--muted:#6B7A55;">

    <!-- Header Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest mb-1" style="color:var(--muted);">Kelola</p>
            <h2 class="text-xl font-bold" style="font-family:'Syne',sans-serif;">Daftar Pengguna</h2>
        </div>
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-semibold text-sm transition hover:opacity-90 flex-shrink-0"
           style="background:var(--neon); color:#000;">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Pengguna
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="relative max-w-sm">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--muted);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                       class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm outline-none focus:ring-2"
                       style="background:var(--card); border:1px solid var(--border); color:var(--text); --tw-ring-color:var(--neon);">
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="rounded-2xl border overflow-hidden" style="background:var(--card); border-color:var(--border);">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b" style="border-color:var(--border); background:rgba(161,210,51,0.05);">
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider" style="color:var(--muted);">Pengguna</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden sm:table-cell" style="color:var(--muted);">Email</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden md:table-cell" style="color:var(--muted);">Role</th>
                        <th class="text-left px-5 py-3.5 text-xs font-bold uppercase tracking-wider hidden lg:table-cell" style="color:var(--muted);">Bergabung</th>
                        <th class="text-right px-5 py-3.5 text-xs font-bold uppercase tracking-wider" style="color:var(--muted);">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color:var(--border);">
                    @forelse($users as $user)
                    <tr class="hover:opacity-80 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0" style="background:var(--neon-glow); color:var(--neon);">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $user->name }}</p>
                                    <p class="text-xs sm:hidden" style="color:var(--muted);">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 hidden sm:table-cell" style="color:var(--muted);">{{ $user->email }}</td>
                        <td class="px-5 py-4 hidden md:table-cell">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold" style="background:var(--neon-glow); color:var(--neon);">
                                {{ $user->role ?? 'User' }}
                            </span>
                        </td>
                        <td class="px-5 py-4 hidden lg:table-cell text-xs" style="color:var(--muted);">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user->user_id) }}"
                                   class="px-3 py-1.5 rounded-lg text-xs font-semibold transition hover:opacity-80"
                                   style="background:var(--neon-glow); color:var(--neon); border:1px solid var(--border);">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user->user_id) }}"
                                      onsubmit="return confirm('Hapus pengguna ini?')">
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
                            <svg class="w-10 h-10 mx-auto mb-2 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Tidak ada pengguna ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
        <div class="px-5 py-4 border-t flex justify-end" style="border-color:var(--border);">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection