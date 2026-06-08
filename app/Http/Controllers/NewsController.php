<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('news.detail', compact('news'));
    }
}