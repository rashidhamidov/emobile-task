<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'costumer_id', 'city_id', 'start_date', 'duration', 'distance',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
