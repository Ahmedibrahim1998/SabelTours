<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
       'first_name', 'last_name', 'email', 'phone', 'travel_date',
       'stay_duration', 'children_count', 'accommodation_type',
       'accommodation_message', 'gender', 'message'
    ];
}
