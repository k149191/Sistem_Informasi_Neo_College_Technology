<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers      = User::count();
        $totalNews       = News::count();
        $totalDepts      = Department::count();
        $totalLecturers  = User::where('role', 'dosen')->count();

        $latestNews  = News::latest('published_at')->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalNews', 'totalDepts', 'totalLecturers',
            'latestNews', 'latestUsers'
        ));
    }
}
