<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $table = 'sports';

    protected $fillable = [
        'n_sport',
        'img_sport',
        'slug_sport',
    ];

    public function courts()
    {
        return $this->belongsToMany(Court::class, 'courts_sports', 'id_sport', 'id_court');
    }
}
