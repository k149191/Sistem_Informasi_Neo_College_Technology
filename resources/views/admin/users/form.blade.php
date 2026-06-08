@extends('admin.layouts.admin')
@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna')

@section('content')
<div class="space-y-6">

    <div class="flex items-center gap-2">
        <a href="{{ route('admin.users.index') }}"
           class="text-sm font-semibold text-gray-500 hover:text-gray-900 transition">
            ← Kembali
        </a>
    </div>

    <div class="rounded-3xl border bg-white shadow-sm p-5 sm:p-6 lg:p-8"
         style="border-color:#E5E7EB;">
        <div class="mb-6">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 mb-2">Form Pengguna</p>
            <h2 class="text-2xl font-extrabold text-gray-900">
                {{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}
            </h2>
            <p class="text-sm text-gray-500 mt-2">
                Kelola data pengguna dengan tampilan yang lebih bersih dan ringan.
            </p>
        </div>

        <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user->user_id) : route('admin.users.store') }}">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">
                        Nama Lengkap
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name ?? '') }}"
                           required
                           class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                           style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                           placeholder="Masukkan nama lengkap">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email ?? '') }}"
                           required
                           class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                           style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                           placeholder="email@example.com">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">
                        Role
                    </label>
                    <select name="role"
                            required
                            class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                            style="border-color:#E5E7EB; --tw-ring-color:#A1D233;">
                        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="dosen" {{ old('role', $user->role ?? '') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">
                        Password {{ isset($user) ? '(kosongkan jika tidak diubah)' : '' }}
                    </label>
                    <input type="password"
                           name="password"
                           {{ isset($user) ? '' : 'required' }}
                           class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                           style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-7 flex flex-col sm:flex-row gap-3 sm:justify-end">
                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold text-sm border bg-white text-gray-700 transition hover:bg-gray-50"
                   style="border-color:#E5E7EB;">
                    Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-bold text-sm transition hover:opacity-90 active:scale-[0.98]"
                        style="background:#A1D233; color:#000;">
                    {{ isset($user) ? 'Simpan Perubahan' : 'Tambah Pengguna' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection