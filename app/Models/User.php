<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'img_user',
        'email',
        'username',
        'password',
        'type_user',
        'name',
        'surname',
        'is_active',
        'is_deleted',
        'birthday',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->id_user = Str::uuid()->toString();
        });
    }

    // ... existing relationships remain unchanged ...
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
    
    public function activities()
    {
        return $this->hasMany(Activity::class, 'id_user_instructor');
    }
}