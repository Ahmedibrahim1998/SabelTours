<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTour extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'name','image'];

    protected $casts = [
        'name' => 'array',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function details()
    {
        return $this->hasMany(TourDetail::class);
    }

    public function tourPlaces()
    {
        return $this->hasMany(TourPlace::class);
    }
    



}
