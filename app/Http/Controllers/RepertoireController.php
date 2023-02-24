<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title' => 'required',
            'title_fr' => 'required',
            'url' => 'required',
        ]);

        // $input = $request->all();

        if ($request->hasFile('url')){
            $destination_path = 'public/repertoires/files';
            $repertoire = $request -> file('url');
            $repertoire_nom = $repertoire -> getClientOriginalName();
            $path = $request->file('url')->storeAs($destination_path, $repertoire_nom);
        }

        // echo ($path);
        // var_dump ($request->url);
        // exit;

        $newRepertoire = Repertoire::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'url'  => $path,
            'user_id' => Auth::user()->id,
        ]); 

        return redirect(route('repertoire.index'));
    }

    /**
     * Download the file from a link
     * 
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */

    public function download(Request $request)
{
    // Retrieve the file path from the request
    $filePath = $request->input('file_path');

    // Check if the file exists
    if (Storage::exists($filePath)) {
        // Return the file as a download response
        return response()->download(storage_path('app/'.$filePath));
    } else {
        // File does not exist
        abort(404);
    }
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
        return view('repertoire.edit', ['repertoire' => $repertoire]);
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
        $repertoire->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
        ]);

        return redirect(route('repertoire.index'));
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
