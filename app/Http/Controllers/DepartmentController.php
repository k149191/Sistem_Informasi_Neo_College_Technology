<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   // Di dalam app/Http/Controllers/DepartmentController.php
    // app/Http/Controllers/DepartmentController.php

    public function show($slug)
    {
        // Memuat relasi head dan lecturers melalui tabel pivot user_departments
        $department = Department::with(['head', 'lecturers'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        return view('department.department_detail', compact('department'));
    }
}