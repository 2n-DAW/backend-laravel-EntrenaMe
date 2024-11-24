<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    protected $table = 'months';
    protected $primaryKey = 'id_month';
    public $timestamps = false;

    protected $fillable = [
        'n_month',
        'slug_month',
    ];
    
    public function courtHours()
    {
        return $this->hasMany(CourtHour::class, 'id_month');
    }
}
