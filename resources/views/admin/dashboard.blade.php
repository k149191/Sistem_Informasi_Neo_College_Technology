@extends('admin.layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <div class="rounded-3xl border bg-white shadow-sm p-5 sm:p-6 lg:p-8"
         style="border-color:#E5E7EB;">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
            <div class="min-w-0">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 mb-2">
                    Admin Panel
                </p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">
                    Dashboard NCT Admin
                </h2>
                <p class="mt-2 text-sm text-gray-600 max-w-2xl">
                    Pantau ringkasan data, kelola berita, dan atur pengguna dari satu tempat dengan tampilan yang lebih rapi dan ringan.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:flex-wrap sm:justify-start lg:justify-end w-full lg:w-auto">
                <a href="{{ route('admin.news.create') }}"
                   class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm transition hover:opacity-90 active:scale-[0.98] w-full sm:w-auto"
                   style="background:#A1D233; color:#000;">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Berita
                </a>

                <a href="{{ route('admin.users.create') }}"
                   class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm border bg-white text-gray-800 transition hover:bg-gray-50 active:scale-[0.98] w-full sm:w-auto"
                   style="border-color:#E5E7EB;">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Tambah Pengguna
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        @php
        $stats = [
            ['label' => 'Total Pengguna', 'value' => $totalUsers ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
            ['label' => 'Total Berita', 'value' => $totalNews ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>'],
            ['label' => 'Total Departemen', 'value' => $totalDepts ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'],
            ['label' => 'Total Dosen', 'value' => $totalLecturers ?? 0, 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>'],
        ];
        @endphp

        @foreach($stats as $stat)
        <div class="rounded-3xl border bg-white shadow-sm p-5 hover:shadow-md transition"
             style="border-color:#E5E7EB;">
            <div class="flex items-start justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-500">
                        {{ $stat['label'] }}
                    </p>
                    <p class="mt-3 text-3xl font-extrabold text-gray-900">
                        {{ $stat['value'] }}
                    </p>
                </div>
                <div class="w-11 h-11 rounded-2xl flex items-center justify-center flex-shrink-0"
                     style="background:rgba(161,210,51,0.14);">
                    <svg class="w-5 h-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        {!! $stat['icon'] !!}
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="rounded-3xl border bg-white shadow-sm overflow-hidden"
         style="border-color:#E5E7EB;">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-6 py-4 border-b"
             style="border-color:#E5E7EB;">
            <div class="min-w-0">
                <h3 class="text-base font-bold text-gray-900">Berita Terbaru</h3>
                <p class="text-sm text-gray-500 mt-1">Daftar konten yang paling baru dibuat atau dipublikasikan.</p>
            </div>
            <a href="{{ route('admin.news.index') }}"
               class="text-sm font-semibold text-gray-900 hover:opacity-70 whitespace-nowrap">
                Lihat semua →
            </a>
        </div>

        <div class="divide-y" style="border-color:#E5E7EB;">
            @forelse($latestNews ?? [] as $news)
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 px-5 sm:px-6 py-4">
                <img src="{{ asset($news->image) }}"
                     alt="{{ $news->title }}"
                     class="w-full sm:w-14 h-40 sm:h-14 rounded-2xl object-cover flex-shrink-0 border"
                     style="border-color:#E5E7EB;">

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">
                        {{ $news->title }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
                    </p>
                </div>
            </div>
            @empty
            <div class="px-6 py-10 text-center">
                <div class="mx-auto w-14 h-14 rounded-2xl flex items-center justify-center mb-4"
                     style="background:rgba(161,210,51,0.14);">
                    <svg class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-700">Belum ada berita.</p>
                <p class="text-xs text-gray-500 mt-1">Tambahkan berita pertama untuk mengisi dashboard.</p>
            </div>
            @endforelse
        </div>
    </div>

    <div class="rounded-3xl border bg-white shadow-sm overflow-hidden"
         style="border-color:#E5E7EB;">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 sm:px-6 py-4 border-b"
             style="border-color:#E5E7EB;">
            <div class="min-w-0">
                <h3 class="text-base font-bold text-gray-900">Pengguna Terbaru</h3>
                <p class="text-sm text-gray-500 mt-1">Data pengguna terbaru yang masuk ke sistem.</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
               class="text-sm font-semibold text-gray-900 hover:opacity-70 whitespace-nowrap">
                Lihat semua →
            </a>
        </div>

        <div class="sm:hidden divide-y" style="border-color:#E5E7EB;">
            @forelse($latestUsers ?? [] as $user)
            <div class="p-5">
                <div class="flex items-start gap-3">
                    <div class="w-11 h-11 rounded-full overflow-hidden flex items-center justify-center text-sm font-bold flex-shrink-0 border"
                         style="background:rgba(161,210,51,0.14); color:#1F2937; border-color:#E5E7EB;">
                        @if(!empty($user->profil_img))
                            <img src="{{ asset($user->profil_img) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                        <p class="text-sm text-gray-600 truncate mt-0.5">{{ $user->email }}</p>

                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold"
                                  style="background:rgba(161,210,51,0.14); color:#4B6E00;">
                                {{ $user->role ?? 'User' }}
                            </span>
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold border text-gray-600"
                                  style="border-color:#E5E7EB;">
                                {{ $user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-6 py-10 text-center">
                <p class="text-sm font-medium text-gray-700">Belum ada pengguna.</p>
                <p class="text-xs text-gray-500 mt-1">Silakan tambahkan user baru dari menu Aksi Cepat.</p>
            </div>
            @endforelse
        </div>

        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="border-b" style="border-color:#E5E7EB;">
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">
                            Pengguna
                        </th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">
                            Email
                        </th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">
                            Role
                        </th>
                        <th class="text-left px-5 py-3 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">
                            Bergabung
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y" style="border-color:#E5E7EB;">
                    @forelse($latestUsers ?? [] as $user)
                    <tr class="hover:bg-gray-50/70 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center text-sm font-bold flex-shrink-0 border"
                                     style="background:rgba(161,210,51,0.14); color:#1F2937; border-color:#E5E7EB;">
                                    @if(!empty($user->profil_img))
                                        <img src="{{ asset($user->profil_img) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                    @else
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    @endif
                                </div>

                                <span class="font-medium text-gray-900 truncate">{{ $user->name }}</span>
                            </div>
                        </td>

                        <td class="px-5 py-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-5 py-4">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold"
                                  style="background:rgba(161,210,51,0.14); color:#4B6E00;">
                                {{ $user->role ?? 'User' }}
                            </span>
                        </td>

                        <td class="px-5 py-4 text-gray-500">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-10 text-center">
                            <p class="text-sm font-medium text-gray-700">Belum ada pengguna.</p>
                            <p class="text-xs text-gray-500 mt-1">Silakan tambahkan user baru dari menu Aksi Cepat.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection