<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'id_user_instructor',
        'n_activities',
        'spots',
        'slug_activity',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'id_user_instructor');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_activity');
    }
}
