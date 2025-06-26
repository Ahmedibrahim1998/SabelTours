<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'team_name', 'about_text', 'goals', 'images'
    ];

    public function getLocalizedField($field, $locale = 'en')
    {
        $json = json_decode($this->{$field}, true);
        return $json[$locale] ?? $json['en'] ?? '';
    }

    public function getImages()
    {
        return json_decode($this->images, true) ?? [];
    }
}
