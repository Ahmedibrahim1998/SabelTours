<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'long_description',
        'images',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function getLocalizedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $desc = json_decode($this->long_description, true);
        return $desc[$locale] ?? $desc['en'] ?? '';
    }

    public function getImages()
    {
        return json_decode($this->images, true);
    }
}