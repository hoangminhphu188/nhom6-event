<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name',
        'event_description',
        'event_location',
        'start_date',
        'end_date',
        'event_image',
        'famous_person',
        'free_food',
        'event_status',
    ];
}
