<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'middlename',
        'surname',
        'gender_id',
        'method_id',
        'contactno',
        'idno',
        'studentno',
        'course',
        'emailaddress',
        'dateofoccupation',
        'nextofkinname',
        'nextofkincontact',
        'room_id',
        'building_id',
    ];
}
