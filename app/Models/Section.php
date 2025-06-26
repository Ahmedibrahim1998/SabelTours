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
        $name = json_decode($this->name, true);
        return $name[$locale] ?? $name['en'] ?? '';
    }

    public function getLocalizedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $desc = json_decode($this->short_description, true);
        return $desc[$locale] ?? $desc['en'] ?? '';
    }

    public function details()
    {
        return $this->hasMany(SectionDetail::class);
    }

}