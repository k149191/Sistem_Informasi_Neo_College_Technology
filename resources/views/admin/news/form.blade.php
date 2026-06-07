@extends('admin.layouts.admin')
@section('title', isset($newsItem) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div style="--neon:#A1D233;--neon-dim:#8BBF1F;--neon-glow:rgba(161,210,51,0.18);--dark:#0D0F0A;--panel:#141610;--card:#1A1D14;--border:rgba(161,210,51,0.15);--text:#E8F0D0;--muted:#6B7A55;">

    <div class="mb-6">
        <a href="{{ route('admin.news.index') }}" class="text-sm font-semibold inline-flex items-center gap-1 mb-2" style="color:var(--muted);">
            ← Kembali
        </a>
        <h2 class="text-xl font-bold" style="font-family:'Syne',sans-serif;">
            {{ isset($newsItem) ? 'Edit Berita' : 'Tambah Berita Baru' }}
        </h2>
    </div>

    <div class="max-w-2xl">
        <div class="rounded-2xl border p-6" style="background:var(--card); border-color:var(--border);">
            <form method="POST"
                  action="{{ isset($newsItem) ? route('admin.news.update', $newsItem->news_id) : route('admin.news.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($newsItem)) @method('PUT') @endif

                <div class="space-y-5">
                    <!-- Judul -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $newsItem->title ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                               placeholder="Masukkan judul berita">
                        @error('title')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Slug (URL)</label>
                        <input type="text" name="slug" value="{{ old('slug', $newsItem->slug ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                               placeholder="contoh-judul-berita">
                        @error('slug')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Konten -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Konten</label>
                        <textarea name="content" rows="8" required
                                  class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition resize-none"
                                  style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                                  placeholder="Tulis konten berita di sini...">{{ old('content', $newsItem->content ?? '') }}</textarea>
                        @error('content')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Gambar</label>
                        @if(isset($newsItem) && $newsItem->image)
                        <div class="mb-3">
                            <img src="{{ asset($newsItem->image) }}" class="h-28 rounded-xl object-cover" style="border:1px solid var(--border);">
                            <p class="text-xs mt-1" style="color:var(--muted);">Gambar saat ini. Upload baru untuk mengganti.</p>
                        </div>
                        @endif
                        <div class="relative">
                            <input type="file" name="image" id="imgInput" accept="image/*" {{ isset($newsItem) ? '' : 'required' }}
                                   class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold"
                                   style="background:var(--panel); border:1px solid var(--border); color:var(--text); file:background:var(--neon-glow); file:color:var(--neon);">
                        </div>
                        @error('image')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Tanggal Publish -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Tanggal Publikasi</label>
                        <input type="date" name="published_at"
                               value="{{ old('published_at', isset($newsItem) ? \Carbon\Carbon::parse($newsItem->published_at)->format('Y-m-d') : date('Y-m-d')) }}"
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none focus:ring-2 transition"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text);">
                        @error('published_at')<p class="mt-1 text-xs" style="color:#f87171;">{{ $message }}</p>@enderror
                    </div>

                    <!-- Carousel Toggle -->
                    <div class="flex items-center justify-between p-4 rounded-xl" style="background:var(--panel); border:1px solid var(--border);">
                        <div>
                            <p class="text-sm font-semibold">Tampilkan di Carousel</p>
                            <p class="text-xs mt-0.5" style="color:var(--muted);">Berita akan tampil di slider utama halaman beranda</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="is_carousel" value="1" class="sr-only peer"
                                   {{ old('is_carousel', $newsItem->is_carousel ?? false) ? 'checked' : '' }}>
                            <div class="w-11 h-6 rounded-full peer transition-all duration-300 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:rounded-full after:w-5 after:h-5 after:transition-all"
                                 style="background:var(--muted);"
                                 id="toggleTrack"></div>
                        </label>
                    </div>
                </div>

                <div class="flex gap-3 mt-7">
                    <button type="submit"
                            class="flex-1 py-3 rounded-xl font-bold text-sm transition hover:opacity-90"
                            style="background:var(--neon); color:#000;">
                        {{ isset($newsItem) ? 'Simpan Perubahan' : 'Publikasikan Berita' }}
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                       class="px-5 py-3 rounded-xl font-semibold text-sm transition border"
                       style="color:var(--muted); border-color:var(--border);">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    input[type="checkbox"].sr-only:checked + div#toggleTrack,
    input[type="checkbox"].sr-only:checked ~ div {
        background: var(--neon) !important;
    }
    /* Simple toggle style via JS */
</style>
<script>
    // Auto-generate slug from title
    const titleInput = document.querySelector('input[name="title"]');
    const slugInput = document.querySelector('input[name="slug"]');
    if (titleInput && slugInput && !slugInput.value) {
        titleInput.addEventListener('input', function() {
            slugInput.value = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
        });
    }

    // Toggle styling
    const checkbox = document.querySelector('input[name="is_carousel"]');
    const track = document.getElementById('toggleTrack');
    function updateToggle() {
        if (checkbox.checked) {
            track.style.background = '#A1D233';
            track.style.setProperty('--tw-after-bg', '#fff');
        } else {
            track.style.background = '#6B7A55';
        }
    }
    if (checkbox && track) {
        updateToggle();
        checkbox.addEventListener('change', updateToggle);
    }
</script>
@endsection