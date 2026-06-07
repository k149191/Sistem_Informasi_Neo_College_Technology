@extends('admin.layouts.admin')
@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna')

@section('content')
<div style="--neon:#A1D233;--neon-dim:#8BBF1F;--neon-glow:rgba(161,210,51,0.18);--dark:#0D0F0A;--panel:#141610;--card:#1A1D14;--border:rgba(161,210,51,0.15);--text:#E8F0D0;--muted:#6B7A55;">

    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-sm font-semibold inline-flex items-center gap-1 mb-2" style="color:var(--muted);">
            ← Kembali
        </a>
        <h2 class="text-xl font-bold" style="font-family:'Syne',sans-serif;">
            {{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}
        </h2>
    </div>

    <div class="max-w-xl">
        <div class="rounded-2xl border p-6" style="background:var(--card); border-color:var(--border);">
            <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user->user_id) : route('admin.users.store') }}">
                @csrf
                @if(isset($user)) @method('PUT') @endif

                <div class="space-y-5">
                    <!-- Nama -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text); --tw-ring-color:var(--neon);"
                               placeholder="Masukkan nama lengkap">
                        @error('name')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text); --tw-ring-color:var(--neon);"
                               placeholder="email@example.com">
                        @error('email')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Role</label>
                        <select name="role" class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                                style="background:var(--panel); border:1px solid var(--border); color:var(--text); --tw-ring-color:var(--neon);">
                            <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ (old('role', $user->role ?? '') == 'user') ? 'selected' : '' }}>User</option>
                            <option value="dosen" {{ (old('role', $user->role ?? '') == 'dosen') ? 'selected' : '' }}>Dosen</option>
                        </select>
                        @error('role')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">
                            Password {{ isset($user) ? '(kosongkan jika tidak diubah)' : '' }}
                        </label>
                        <input type="password" name="password" {{ isset($user) ? '' : 'required' }}
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text); --tw-ring-color:var(--neon);"
                               placeholder="••••••••">
                        @error('password')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex gap-3 mt-7">
                    <button type="submit"
                            class="flex-1 py-3 rounded-xl font-bold text-sm transition hover:opacity-90"
                            style="background:var(--neon); color:#000;">
                        {{ isset($user) ? 'Simpan Perubahan' : 'Tambah Pengguna' }}
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                       class="px-5 py-3 rounded-xl font-semibold text-sm transition border"
                       style="color:var(--muted); border-color:var(--border);">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection