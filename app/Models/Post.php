<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'description',
        'status',
        'create_user_id', 
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated-at'
    ];

    
    protected $date = [
        'deleted_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }

}
