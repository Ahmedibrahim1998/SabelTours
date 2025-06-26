<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'comment', 'rating', 'image','tour_detail_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
