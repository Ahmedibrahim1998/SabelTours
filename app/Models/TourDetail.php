<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id', 'image', 'description', 'rate', 'agenda', 'from_month', 'to_month', 'price'
    ];

    protected $casts = [
        'description' => 'array',
        'agenda' => 'array',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function getLocalizedDescription($locale)
    {
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }

    public function getAgendaDetails()
    {
        $agenda = $this->agenda;

        return [
            'morning' => $agenda['morning'] ?? ['text' => '', 'images' => []],
            'noon'    => $agenda['noon'] ?? ['text' => '', 'images' => []],
            'evening' => $agenda['evening'] ?? ['text' => '', 'images' => []],
        ];
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
