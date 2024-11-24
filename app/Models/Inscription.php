<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $fillable = [
        'id_activity',
        'id_user_client',
        'slug_inscription',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id_activity');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_user_client');
    }
}
