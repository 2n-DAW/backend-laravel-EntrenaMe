<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $table = 'courts';

    protected $fillable = [
        'n_court',
        'img_court',
        'slug_court',
    ];
    
    public $timestamps = false;

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'courts_sports', 'id_court', 'id_sport');
    }

    public function courtHours()
    {
        return $this->hasMany(CourtHour::class, 'id_court');
    }
}
