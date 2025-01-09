<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $primaryKey = 'id_activity';
    public $timestamps = false;

    protected $fillable = [
        'id_user_instructor',
        'n_activity',
        'spots',
        'spots_available',
        'slug_activity',
        'description',
        'img_activity',
        'slot_hour',
        'week_day',
        'id_sport',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'id_user_instructor');
    }
    
    public function sport()
    {
        return $this->belongsTo(Sport::class, 'id_sport');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_activity');
    }
    
}
