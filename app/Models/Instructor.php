<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    protected $fillable = [
        'id_user',
        'nif',
        'tlf',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
