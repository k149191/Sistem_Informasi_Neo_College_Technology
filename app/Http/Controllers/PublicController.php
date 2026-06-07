<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User; // Pastikan User di-import
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $carouselNews = News::orderBy('published_at', 'desc')->take(3)->get();
        $latestNews = News::orderBy('published_at', 'desc')->skip(3)->take(6)->get();

        // Ambil Rektor (asumsi role 'rektor')
        $rektor = \App\Models\User::where('role', 'rektor')->first();
        
        // Ambil Departemen beserta head_user-nya
        $departments = \App\Models\Department::where('status', 'active')->get();
        
        // ... (data carouselNews dan latestNews tetap sama)
        
        return view('home', compact('rektor', 'departments', 'carouselNews', 'latestNews'));
    }
}