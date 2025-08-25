<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id', 'image','sub_tour_id', 'description','title','location'
    ];

    protected $casts = [
        'description' => 'array',
        'title' => 'array',
        'location' => 'array',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function info()
    {
        return $this->hasMany(TourDetailInfo::class, 'tour_detail_id');
    }

    public function getLocalizedTitle($locale)
    {
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    public function getLocalizedName($locale)
    {
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    public function getLocalizedDescription($locale)
    {
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }
    
    public function getLocalizedLocation($locale)
    {
        if (is_array($this->location)) {
            return $this->location[$locale] ?? $this->location['en'] ?? '';
        }
        return $this->location ?? '';
    }
    public function subTour()
    {
        return $this->belongsTo(SubTour::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
