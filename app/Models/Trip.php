<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'gender',
        'first_name',
        'last_name',
        'email',
        'phone',
        'adults_count',
        'children_count',
        'travel_date',
        'message',
    ];

}
