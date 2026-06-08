@extends('admin.layouts.admin')
@section('title', isset($newsItem) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-2">
        <a href="{{ route('admin.news.index') }}"
           class="text-sm font-semibold inline-flex items-center gap-1 text-gray-500 hover:text-gray-700">
            ← Kembali
        </a>
        <h2 class="text-2xl font-extrabold text-gray-900">
            {{ isset($newsItem) ? 'Edit Berita' : 'Tambah Berita Baru' }}
        </h2>
        <p class="text-sm text-gray-500">
            Kelola judul, konten, gambar, dan publikasi berita.
        </p>
    </div>

    <div class="max-w-6xl w-full">
        <div class="rounded-3xl border bg-white shadow-sm p-5 sm:p-6"
             style="border-color:#E5E7EB;">
            <form method="POST"
                  action="{{ isset($newsItem) ? route('admin.news.update', $newsItem->news_id) : route('admin.news.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($newsItem)) @method('PUT') @endif

                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $newsItem->title ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                               style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                               placeholder="Masukkan judul berita">
                        @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">Slug (URL)</label>
                        <input type="text" name="slug" value="{{ old('slug', $newsItem->slug ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                               style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                               placeholder="contoh-judul-berita">
                        @error('slug') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">Konten</label>
                        <textarea name="content" rows="8" required
                                  class="w-full px-4 py-3 rounded-xl text-sm outline-none transition resize-none border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                                  style="border-color:#E5E7EB; --tw-ring-color:#A1D233;"
                                  placeholder="Tulis konten berita di sini...">{{ old('content', $newsItem->content ?? '') }}</textarea>
                        @error('content') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">Gambar</label>
                        @if(isset($newsItem) && $newsItem->image)
                        <div class="mb-3">
                            <img src="{{ asset($newsItem->image) }}"
                                 alt="{{ $newsItem->title }}"
                                 class="h-28 rounded-xl object-cover border"
                                 style="border-color:#E5E7EB;">
                            <p class="text-xs mt-1 text-gray-500">Gambar saat ini. Upload baru untuk mengganti.</p>
                        </div>
                        @endif

                        <input type="file" name="image" id="imgInput" accept="image/*" {{ isset($newsItem) ? '' : 'required' }}
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold focus:bg-white focus:ring-2"
                               style="border-color:#E5E7EB; --tw-ring-color:#A1D233;">
                        @error('image') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tagar
                        </label>

                        <select name="tagar"
                                class="w-full px-4 py-3 rounded-xl border bg-white text-gray-900">
                            <option value="nct">NCT</option>
                            <option value="nct-127">NCT 127</option>
                            <option value="nct-dream">NCT DREAM</option>
                            <option value="wayv">WayV</option>
                            <option value="nct-dojaejung">NCT DOJAEJUNG</option>
                            <option value="nct-wish">NCT WISH</option>
                            <option value="nct-jnjm">NCT JNJM</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2 text-gray-500">Tanggal Publikasi</label>
                        <input type="date" name="published_at"
                               value="{{ old('published_at', isset($newsItem) ? \Carbon\Carbon::parse($newsItem->published_at)->format('Y-m-d') : date('Y-m-d')) }}"
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition border bg-gray-50 text-gray-900 focus:bg-white focus:ring-2"
                               style="border-color:#E5E7EB; --tw-ring-color:#A1D233;">
                        @error('published_at') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between gap-4 p-4 rounded-2xl border bg-gray-50"
                         style="border-color:#E5E7EB;">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Tampilkan di Carousel</p>
                            <p class="text-xs mt-0.5 text-gray-500">Berita akan tampil di slider utama halaman beranda.</p>
                        </div>

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input
                                type="checkbox"
                                name="is_carousel"
                                value="1"
                                class="sr-only peer"
                                {{ old('is_carousel', $newsItem->is_carousel ?? false) ? 'checked' : '' }}
                            >

                            <div
                                class="w-11 h-6 rounded-full bg-gray-300
                                    peer-checked:bg-[#A1D233]
                                    transition-all
                                    after:content-['']
                                    after:absolute
                                    after:top-0.5
                                    after:left-[2px]
                                    after:bg-white
                                    after:rounded-full
                                    after:h-5
                                    after:w-5
                                    after:transition-all
                                    peer-checked:after:translate-x-5">
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 mt-7">
                    <button type="submit"
                            class="flex-1 py-3 rounded-xl font-bold text-sm transition hover:opacity-90"
                            style="background:#A1D233; color:#000; box-shadow:0 0 18px rgba(161,210,51,.22);">
                        {{ isset($newsItem) ? 'Simpan Perubahan' : 'Publikasikan Berita' }}
                    </button>

                    <a href="{{ route('admin.news.index') }}"
                       class="px-5 py-3 rounded-xl font-semibold text-sm transition border bg-white text-gray-700 hover:bg-gray-50"
                       style="border-color:#E5E7EB;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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

    if (checkbox && track) {
        updateToggle();
        checkbox.addEventListener('change', updateToggle);
    }
</script>
@endsection