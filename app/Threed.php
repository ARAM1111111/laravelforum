<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threed extends Model
{
    protected $fillable = ['subject', 'type', 'threed', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
    	return $this->morphMany(Comment::class,'commentable');
    }
}
