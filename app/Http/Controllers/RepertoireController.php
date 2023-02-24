<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repertoires =  Repertoire::selectRepertoire();

        return view('repertoire.index', ['repertoires'=>$repertoires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        //
    }
}
