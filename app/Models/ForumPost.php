<?php

namespace App\Models;

// use App\Models\ForumPost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    static public function selectForumPost(){
        $lang = session()->get('localeDB');
        
        $query = ForumPost::select('id', 
        DB::raw("(case when title$lang is null then title else title$lang end) as title"),
        'created_at'
        )
        ->orderby('created_at')
        ->get();
        return $query;
    }
    static public function selectForumSinglePost($id){
        $lang = session()->get('localeDB');
        
        $query = ForumPost::select('id', 
        DB::raw("(case when title$lang is null then title else title$lang end) as title"),
        DB::raw("(case when body$lang is null then body else body$lang end) as body"),
        'user_id',
        'created_at'

        )
        ->where('id', $id)
        ->first();
        return $query;
    }
}
