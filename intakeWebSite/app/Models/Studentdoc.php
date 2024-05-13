<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentdoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'student_id',
    ];
}
