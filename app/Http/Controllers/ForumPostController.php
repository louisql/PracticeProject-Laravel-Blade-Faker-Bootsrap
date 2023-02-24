<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $forums = ForumPost::all();
        $forums =  ForumPost::selectForumPost();
        // echo $forums;
        // exit();
        return view('forum.index', ['forums'=>$forums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = ForumPost::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'body'  => $request->body,
            'body_fr'  => $request->body_fr,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('forum.show', $newPost->id));
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {
        $forumPost =  ForumPost::selectForumSinglePost($forumPost->id);

        // $date = new DateTime($forumPost->created_at);
        // $formattedDate = $date->format('Y-m-d H:i:s');
        // $forumPost->created_at = $formattedDate;

        // echo($forumPost->created_at) ;
        // exit;
    
        return view('forum.show', ['forumPost' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        return view('forum.edit', ['forumPost' => $forumPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        $forumPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect(route('forum.show', $forumPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost)
    {
        $forumPost->delete();

        return redirect(route('forum.index'));
    }
}
