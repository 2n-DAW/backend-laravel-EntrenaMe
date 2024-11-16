<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'id_user',
        'nif',
        'tlf',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_user_client');
    }
}
