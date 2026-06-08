<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'tagar'        => 'required|in:nct,nct-127,nct-dream,wayv,nct-dojaejung,nct-wish,nct-jnjm',
        ]);

        $file = $request->file('image');

        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('img/news'), $fileName);

        $imagePath = 'img/news/' . $fileName;

        News::create([
            'title'        => $request->input('title'),
            'slug'         => Str::slug($request->input('slug')),
            'content'      => $request->input('content', ''),
            'image'        => $imagePath,
            'author_id'    => auth()->user()->user_id,
            'author_name'  => auth()->user()->name,
            'published_at' => $request->input('published_at'),
            'is_carousel'  => $request->boolean('is_carousel'),
            'tagar'        => $request->input('tagar'),
        ]);

        return redirect()
            ->route('admin.news.index')
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
            'tagar'        => 'required|in:nct,nct-127,nct-dream,wayv,nct-dojaejung,nct-wish,nct-jnjm',
        ]);

        $data = [
            'title'        => $request->input('title'),
            'slug'         => Str::slug($request->input('slug')),
            'content'      => $request->input('content', ''),
            'published_at' => $request->input('published_at'),
            'is_carousel'  => $request->boolean('is_carousel'),
            'tagar'        => $request->input('tagar'),
        ];

        if ($request->hasFile('image')) {

            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }

            $file = $request->file('image');

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('img/news'), $fileName);

            $data['image'] = 'img/news/' . $fileName;
        }

        $news->update($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}