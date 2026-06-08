<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $carouselNews = News::where('is_carousel', 1)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $latestNews = News::where('is_carousel', 0)
            ->orderByDesc('published_at')
            ->take(6)
            ->get();

        $rektor = User::where('role', 'rektor')->first();

        $departments = \App\Models\Department::where('status', 'active')
            ->get();

        return view('home', compact(
            'rektor',
            'departments',
            'carouselNews',
            'latestNews'
        ));
    }
}