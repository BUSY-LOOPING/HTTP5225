<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'department'
    ];

    // One-to-One relationship with course
    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
