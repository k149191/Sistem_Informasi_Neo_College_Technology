<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::latest('published_at');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(10)->withQueryString();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|unique:news,slug',
            'content'      => 'required|string',
            'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'published_at' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('news', 'public');

        News::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->slug),
            'content'      => $request->content,
            'image'        => 'storage/' . $imagePath,
            'author_id'    => auth()->user()->user_id,
            'author_name'  => auth()->user()->name,
            'published_at' => $request->published_at,
            'is_carousel'  => $request->boolean('is_carousel'),
        ]);

        return redirect()->route('admin.news.index')
                         ->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function edit(News $news)
    {
        $newsItem = $news;
        return view('admin.news.form', compact('newsItem'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|unique:news,slug,' . $news->news_id . ',news_id',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'published_at' => 'required|date',
        ]);

        $data = [
            'title'        => $request->title,
            'slug'         => Str::slug($request->slug),
            'content'      => $request->content,
            'published_at' => $request->published_at,
            'is_carousel'  => $request->boolean('is_carousel'),
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldPath = str_replace('storage/', '', $news->image);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $imagePath = $request->file('image')->store('news', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
                         ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        // Hapus gambar dari storage
        $oldPath = str_replace('storage/', '', $news->image);
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
                         ->with('success', 'Berita berhasil dihapus!');
    }
}
