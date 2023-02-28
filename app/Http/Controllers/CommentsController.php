<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
    $post = Post::where('slug', $slug)->first();
    $comments = Comments::where('post_id', $post->id)->get();
    return view('forum.posts', compact('post', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::where('id', $id)->get('id');
        $json = $post;
        $array = json_decode($json, true);
        $post_id = $array[0]['id'];
        
        return view('comments.comm', compact('post', 'post_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (empty($data['post_id'])) {
            return redirect()->back()->withErrors(['post_id' => 'The post ID field is required.']);
        }

        $comment = new Comments;
        $comment->content = $request->content;
        $comment->user_id = $data['user_id'];
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        Post::find($request->slug);
        return redirect()->route('show.post', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
