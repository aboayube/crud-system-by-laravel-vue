<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return  response()->json($posts);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if ($request->file('image')) {
            $file = $request->file('image');
            $image_name = date('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('images'), $image_name);
        }
        $post = Post::create([
            'title' => $request->title,
            'descrption' => $request->descrption,
            'image' => $image_name
        ]);
        return  response()->json('post created');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $image = '';
        if ($request->file('image')) {
            $file = $request->file('image');
            $image_name = date('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('images'), $image_name);
            $post->image = $image_name;
        }
        $post->title = $request->title;
        $post->descrption = $request->descrption;
        $post->save();
        return response()->json('post update');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('delete successfuly');
        //
    }
}
