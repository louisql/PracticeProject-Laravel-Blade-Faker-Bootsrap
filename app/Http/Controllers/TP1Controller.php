<?php

namespace App\Http\Controllers;

use App\Models\TP1;
use Illuminate\Http\Request;

class TP1Controller extends Controller
{
    public function index(){
        // return view('hello', ['name'=>'Louis']);
        return view ('index');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
    public function post(){
        return view('post');
    }
}
