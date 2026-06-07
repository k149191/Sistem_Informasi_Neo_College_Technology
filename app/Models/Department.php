<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // Menentukan nama tabel karena jamak
    protected $table = 'departments';

    // Menentukan primary key
    protected $primaryKey = 'dept_id';

    // Mengizinkan field yang bisa diisi
    protected $fillable = ['name', 'slug', 'description', 'head_user_id', 'status'];

    // Menambahkan relasi ke User (untuk mendapatkan nama Kepala Departemen)
    public function head()
    {
        return $this->belongsTo(User::class, 'head_user_id', 'user_id');
    }

    // Di dalam app/Models/Department.php
    // app/Models/Department.php

    public function lecturers()
    {
        // Menggunakan belongsToMany karena relasinya banyak ke banyak (pivot)
        // Parameter: Model, tabel pivot, foreign key departemen, foreign key user
        return $this->belongsToMany(User::class, 'user_departments', 'dept_id', 'user_id')
                    ->where('role', 'dosen');
    }
}