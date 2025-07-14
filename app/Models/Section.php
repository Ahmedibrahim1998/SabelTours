<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'image',
        'type',
    ];

    public function getLocalizedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->name[$locale] ?? $this->name['en'] ?? '';
    }

    public function getLocalizedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->short_description[$locale] ?? $this->short_description['en'] ?? '';
    }


    public function details()
    {
        return $this->hasMany(SectionDetail::class);
    }

    public function getNameAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getShortDescriptionAttribute($value)
    {
        return json_decode($value, true);
    }

}
