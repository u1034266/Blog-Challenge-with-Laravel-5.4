<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function publicHomePage() {
        /*Pagination works, but more improvements to make it fully dynamic. */
        $posts = Post::paginate(10);

        return view('blog/home',['posts'=>$posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUserId = Auth::id();
        $posts = Post::all()->where('user_id', $loggedInUserId);

        return view('adminPanel/home', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $postTitle = $request->title;
        $postBody = $request->body;
        $postUserId = Auth::id();
        if ( isset($request->active) && ($request->active = 'on')) {
            $postActiveStatus = 1;
        } else {
            $postActiveStatus = 0;
        }

        $post->user_id = $postUserId;
        $post->title = $postTitle;
        $post->body = $postBody;
        $post->active = $postActiveStatus;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        /*$thisUserDetails = DB::table('users')->where('id',$post->user_id)->get();*/

        $data = array(
            'id' => $post->id,
            'post' => $post

        );

        /*Debug*/
        /*return $data['post'];*/

        return view('blog.view_post', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = array(
            'id' => $post->id,
            'post' => $post

        );

        /*Debug*/
        /*return $data['post'];*/

        return view('adminPanel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (isset($request->title)) {
            $post->title = $request->title;
        }

        if (isset($request->body)) {
            $post->body = $request->body;
        }

        if (isset($request->active)) {
            $post->active = 1;
        } else {
            $post->active = 0;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $id = $post->id;

        $post->delete();

        return redirect()->route('posts.index');
    }
}
