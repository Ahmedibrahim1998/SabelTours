<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'title', 'content', 'image', 'images'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getLocalizedContent($locale = 'en')
    {
        $content = json_decode($this->content, true);
        return $content[$locale] ?? $content['en'] ?? '';
    }

    public function getImages()
    {
        return json_decode($this->images, true) ?? [];
    }

}
