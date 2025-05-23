<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function content(){
        return $this->hasOne(Content::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
