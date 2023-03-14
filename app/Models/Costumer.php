<?php

namespace App\Models;

use App\Traits\Human;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory, Human;

    protected $fillable = [
        'id', 'name', 'surname', 'gender', 'birthday', 'phone', 'year', 'car_id', 'color'
    ];


    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'costumer_id');
    }

    public function getLastCity()
    {
        return $this->trips()->orderBy('start_date', 'desc')->first();
    }

    public function getFullDuration()
    {
        return $this->trips()->sum('duration');
    }

    public function getFullDistance()
    {
        return $this->trips()->sum('distance');
    }
}
