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
        
        $logged_user = Auth::user()->id;
        // echo $logged_user;
        // exit();
        
        return view('forum.index', ['forums'=>$forums, 'logged_user'=>$logged_user]);
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
        $request->validate([
            'title' => 'required',
            'title_fr' => 'required',
            'body' => 'required|min:6|max:2000',
            'body_fr' => 'required|min:6|max:2000',
        ]);

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

        $logged_user = Auth::user()->id;
    
        return view('forum.show', ['forumPost' => $forumPost, 'logged_user'=>$logged_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {

        $logged_user = Auth::user()->id;

        return view('forum.edit', ['forumPost' => $forumPost, 'logged_user'=>$logged_user]);
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
