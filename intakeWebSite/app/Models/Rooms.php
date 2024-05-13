<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'type_id',
        'building_id',
        'gender_id',
        'status',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
