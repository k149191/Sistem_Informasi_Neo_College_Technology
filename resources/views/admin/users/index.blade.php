@extends('admin.layouts.admin')
@section('title', 'Manajemen Pengguna')

@section('content')
<div class="space-y-6">

    <div class="rounded-3xl border bg-white shadow-sm p-5 sm:p-6"
         style="border-color:#E5E7EB;">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="min-w-0">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-gray-500 mb-2">Kelola Pengguna</p>
                <h2 class="text-2xl font-extrabold text-gray-900">Daftar Pengguna</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Tambah, ubah, cari, dan hapus data pengguna dari satu tempat.
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm transition hover:opacity-90 active:scale-[0.98] whitespace-nowrap"
               style="background:#A1D233; color:#000;">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Pengguna
            </a>
        </div>
    </div>

    <div class="rounded-3xl border bg-white shadow-sm p-5 sm:p-6"
         style="border-color:#E5E7EB;">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center w-full">
                 <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari nama atau email..."
                           class="w-full pl-10 pr-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                           style="border-color:#E5E7EB; --tw-ring-color:#A1D233;">
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-sm transition hover:opacity-90 active:scale-[0.98] whitespace-nowrap"
                        style="
                            background:#A1D233;
                            color:#000;
                            box-shadow:0 0 18px rgba(161,210,51,.35);
                        ">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <div class="md:hidden space-y-4">
        @forelse($users as $user)
        <div class="rounded-3xl border bg-white shadow-sm p-5"
             style="border-color:#E5E7EB;">
            <div class="flex items-start gap-3">
                <div class="w-11 h-11 rounded-full overflow-hidden flex items-center justify-center text-sm font-bold flex-shrink-0 border"
                    style="background:rgba(161,210,51,0.14); color:#1F2937; border-color:#E5E7EB;">

                    @if(!empty($user->profil_img))
                        <img src="{{ asset($user->profil_img) }}"
                            alt="{{ $user->name }}"
                            class="w-full h-full object-cover"
                            onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif

                </div>

                <div class="min-w-0 flex-1">
                    <p class="font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500 truncate mt-0.5">{{ $user->email }}</p>

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

                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('admin.users.edit', $user->user_id) }}"
                           class="inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold border bg-gray-50 text-gray-800 transition hover:bg-gray-100"
                           style="border-color:#E5E7EB;">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.users.destroy', $user->user_id) }}" class="js-delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold transition"
                                    style="background:rgba(248,113,113,0.10); color:#dc2626; border:1px solid rgba(248,113,113,0.18);">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="rounded-3xl border bg-white shadow-sm p-8 text-center"
             style="border-color:#E5E7EB;">
            <p class="text-sm font-medium text-gray-700">Tidak ada pengguna ditemukan.</p>
            <p class="text-xs text-gray-500 mt-1">Coba kata kunci lain atau tambahkan pengguna baru.</p>
        </div>
        @endforelse
    </div>

    <div class="hidden md:block rounded-3xl border bg-white shadow-sm overflow-hidden"
         style="border-color:#E5E7EB;">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="border-b" style="border-color:#E5E7EB;">
                        <th class="text-left px-5 py-4 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Pengguna</th>
                        <th class="text-left px-5 py-4 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Email</th>
                        <th class="text-left px-5 py-4 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Role</th>
                        <th class="text-left px-5 py-4 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Bergabung</th>
                        <th class="text-right px-5 py-4 text-xs font-bold uppercase tracking-[0.18em] text-gray-500">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y" style="border-color:#E5E7EB;">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50/70 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center text-sm font-bold flex-shrink-0 border"
                                style="background:rgba(161,210,51,0.14); color:#1F2937; border-color:#E5E7EB;">

                                @if(!empty($user->profil_img))
                                    <img src="{{ asset($user->profil_img) }}"
                                        alt="{{ $user->name }}"
                                        class="w-full h-full object-cover"
                                        onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                                @else
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                @endif

                            </div>
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                                </div>
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

                        <td class="px-5 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user->user_id) }}"
                                   class="px-3 py-2 rounded-xl text-xs font-semibold border bg-gray-50 text-gray-800 transition hover:bg-gray-100"
                                   style="border-color:#E5E7EB;">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.users.destroy', $user->user_id) }}" class="js-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-2 rounded-xl text-xs font-semibold transition"
                                            style="background:rgba(248,113,113,0.10); color:#dc2626; border:1px solid rgba(248,113,113,0.18);">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-5 py-12 text-center">
                            <p class="text-sm font-medium text-gray-700">Tidak ada pengguna ditemukan.</p>
                            <p class="text-xs text-gray-500 mt-1">Coba kata kunci lain atau tambahkan pengguna baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="px-5 py-4 border-t flex justify-end" style="border-color:#E5E7EB;">
            {{ $users->links('pagination::tailwind') }}
        </div>
        @endif
    </div>

    @if($users->hasPages())
    <div class="md:hidden">
        {{ $users->links('pagination::tailwind') }}
    </div>
    @endif
</div>

<div id="deleteConfirmModal" class="fixed inset-0 z-[9999] hidden items-center justify-center px-4">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

    <div class="relative w-full max-w-md rounded-3xl bg-white border shadow-2xl p-6"
         style="border-color:#A1D233; box-shadow:0 0 0 1px rgba(161,210,51,.25), 0 20px 60px rgba(0,0,0,.18);">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0"
                 style="background:rgba(161,210,51,0.14); color:#4B6E00;">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>

            <div class="min-w-0 flex-1">
                <h3 class="text-lg font-extrabold text-gray-900">Hapus pengguna?</h3>
                <p class="text-sm text-gray-600 mt-1">
                    Data pengguna ini akan dihapus permanen dan tidak bisa dikembalikan.
                </p>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button type="button" id="cancelDeleteBtn"
                    class="px-4 py-2 rounded-xl text-sm font-semibold border bg-white text-gray-700 hover:bg-gray-50"
                    style="border-color:#E5E7EB;">
                Batal
            </button>

            <button type="button" id="confirmDeleteBtn"
                    class="px-4 py-2 rounded-xl text-sm font-semibold text-black transition hover:opacity-90"
                    style="background:#A1D233; box-shadow:0 0 18px rgba(161,210,51,.35);">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('deleteConfirmModal');
    const cancelBtn = document.getElementById('cancelDeleteBtn');
    const confirmBtn = document.getElementById('confirmDeleteBtn');

    if (!modal || !cancelBtn || !confirmBtn) return;

    let targetForm = null;

    function openModal(form) {
        targetForm = form;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        targetForm = null;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.querySelectorAll('.js-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            openModal(form);
        });
    });

    cancelBtn.addEventListener('click', closeModal);

    confirmBtn.addEventListener('click', function () {
        if (targetForm) targetForm.submit();
    });

    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });
});
</script>
@endsection

<style>
nav[role="navigation"] p{
    display:none !important;
}

nav[role="navigation"] a[rel="prev"],
nav[role="navigation"] a[rel="next"],
nav[role="navigation"] span[aria-disabled="true"]{
    display:none !important;
}

@media (max-width: 640px){
    nav[role="navigation"] > div:first-child{
        display:none !important;
    }
}

nav[role="navigation"] span,
nav[role="navigation"] a{
    min-width:42px;
    height:42px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    border-radius:14px;
    border:1px solid #E5E7EB;
    background:#fff;
    color:#374151;
    font-weight:600;
    transition:.2s ease;
}

nav[role="navigation"] a:hover{
    border-color:#A1D233;
    background:#fff;
    color:#000;
    box-shadow:0 0 0 3px rgba(161,210,51,.15);
}

nav[role="navigation"] span[aria-current="page"] span{
    background:#A1D233 !important;
    color:#000 !important;
    border-color:#A1D233 !important;
    box-shadow:
        0 0 0 1px rgba(161,210,51,.25),
        0 0 18px rgba(161,210,51,.45);
}

nav[role="navigation"] > div:last-child{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:8px;
}

nav[role="navigation"] svg{
    width:16px;
    height:16px;
}
</style>