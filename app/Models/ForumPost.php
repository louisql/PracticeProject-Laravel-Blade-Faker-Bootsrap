<?php

namespace App\Models;

// use App\Models\ForumPost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'body',
        'body_fr',
        'date',
        'user_id'
    ];

    public function forumPostHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
