<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        PostResource::collection($posts); // This retrieves all posts as a collection
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }
    

    public function update(PostRequest $request, Post $post){

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }
}
