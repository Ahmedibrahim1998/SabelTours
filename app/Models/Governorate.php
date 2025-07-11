<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = [
        'name',
        'places_count',
        'image',
    ];

    protected $casts = [
        'name' => 'array',
    ];


    // Governorate.php
    public function places()
    {
        return $this->hasMany(Place::class);
    }


    /**
     * Get the name based on requested locale.
     */
   // ارجع الاسم حسب اللغة من النص المخزن
    public function getLocalizedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        // اجبر تحويلها إلى Array إذا كانت String
        $name = is_string($this->name) ? json_decode($this->name, true) : $this->name;

        return $name[$locale] ?? $name['en'] ?? '';
    }


}
