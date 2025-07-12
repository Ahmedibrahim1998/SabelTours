<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'governorate_id',
        'name',
        'short_description',
        'image',
        'location',
    ];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function getLocalizedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $name = is_string($this->name) ? json_decode($this->name, true) : $this->name;
        return $name[$locale] ?? $name['en'] ?? '';
    }

    public function getLocalizedShortDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $desc = is_string($this->short_description) ? json_decode($this->short_description, true) : $this->short_description;
        return $desc[$locale] ?? $desc['en'] ?? '';
    }
}
