<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'img_user',
        'email',
        'username',
        'password',
        'type_user',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_user');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id_user');
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class, 'id_user');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_user');
    }
}
