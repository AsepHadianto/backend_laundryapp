<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'password',
        'role_id'
    ];

    // protected $hidden = ('password');

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function salesRecords()
    {
        return $this->hasMany(SalesRecord::class);
    }
}
