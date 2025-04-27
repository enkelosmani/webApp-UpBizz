<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'post_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
