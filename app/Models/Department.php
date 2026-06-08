<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'dept_id';

    protected $fillable = ['name', 'slug', 'description', 'head_user_id', 'status'];

    public function head()
    {
        return $this->belongsTo(User::class, 'head_user_id', 'user_id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(User::class, 'user_departments', 'dept_id', 'user_id')
                    ->where('role', 'dosen');
    }
}