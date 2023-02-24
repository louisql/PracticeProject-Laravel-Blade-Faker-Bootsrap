<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Repertoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'date',
        'url',
        'user_id'
    ];

    public function RepertoireHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function selectRepertoire(){
        $lang = session()->get('localeDB');
        
        $query = Repertoire::select('id', 
        DB::raw("(case when title$lang is null then title else title$lang end) as title"),
        'created_at',
        'url',
        'user_id'
        )
        ->orderby('created_at')
        ->get();
        return $query;
    }
}
