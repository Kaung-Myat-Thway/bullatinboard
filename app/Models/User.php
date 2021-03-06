<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'type',
        'address',
        'phone',
        'dob',
        'created_user_id',
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated-at'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 
    public function created_user()
    {
          return $this->belongsTo(User::class, 'created_user_id');
    }

    public function posts()
    {
      return $this->hasMany(Post::class, 'create_user_id');
    }
}

