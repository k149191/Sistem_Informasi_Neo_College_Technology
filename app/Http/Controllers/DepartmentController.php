<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show($slug)
    {
        $department = Department::with(['head', 'lecturers'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        return view('department.department_detail', compact('department'));
    }
}