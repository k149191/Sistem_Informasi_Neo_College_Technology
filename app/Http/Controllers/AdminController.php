<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $stats = [
            'total_users' => User::count(),
            'total_news' => News::count(),
            'total_admin' => User::where('role', 'admin')->count()
        ];
        
        $news = News::latest()->paginate(10);
        
        return view('admin.dashboard', compact('news', 'stats'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'published_at' => 'required|date'
        ]);

        $images = ['news1.jpg', 'news2.jpg', 'news3.jpg'];
        $validated['image'] = '/img/' . $images[array_rand($images)];
        $validated['slug'] = Str::slug($request->title);

        News::create($validated);
        return back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function destroy($id) {
        News::destroy($id);
        return back()->with('success', 'Berita dihapus!');
    }
}