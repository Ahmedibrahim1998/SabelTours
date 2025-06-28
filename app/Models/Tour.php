<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'type', 'image', 'gallery',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'gallery' => 'array',
    ];

    public function getLocalizedName($locale)
    {
        return $this->name[$locale] ?? $this->name['en'] ?? null;
    }

    public function getLocalizedDescription($locale)
    {
        return $this->description[$locale] ?? $this->description['en'] ?? null;
    }

    public function getGalleryImages()
    {
        return is_array($this->gallery) ? $this->gallery : json_decode($this->gallery, true);
    }

    public function subTours()
    {
        return $this->hasMany(SubTour::class);
    }

    public function details()
    {
        return $this->hasMany(TourDetail::class);
    }


    public function comments()
    {
        return $this->hasManyThrough(
            \App\Models\Comment::class,     // النموذج النهائي
            \App\Models\TourDetail::class,  // النموذج الوسيط
            'tour_id',        // مفتاح Tour في TourDetail
            'tour_detail_id', // مفتاح TourDetail في comments
            'id',             // مفتاح Tour
            'id'              // مفتاح TourDetail
        );
    }

}
