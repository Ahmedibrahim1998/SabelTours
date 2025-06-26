<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'description', 'image'];

     protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

   public function getLocalizedName($locale = 'en')
    {
        return $this->name[$locale] ?? $this->name['en'] ?? '';
    }

    public function getLocalizedDescription($locale = 'en')
    {
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function averageRating()
    {
        return $this->comments()->avg('rating');
    }

}
