<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetailInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_detail_id', 'agenda', 'from_month', 'to_month', 'price'
    ];

    protected $casts = [
        'agenda' => 'array',
        'from_month' => 'array',
        'to_month' => 'array',
    ];

    public function tourDetail()
    {
        return $this->belongsTo(\App\Models\TourDetail::class);
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
}
