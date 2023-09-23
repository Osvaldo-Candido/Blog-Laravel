<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();

        return view('posts.PostView',compact('posts'));
    }

    public function post($post)
    {
        $post = Post::where('slug',$post)->firstOrFail();

        return view('posts.SinglePostView',compact('post'));
    }

    public function states($state)
    {
        $posts = Post::where('is_active',$state)->paginate(5);

        return view('posts.PostState',compact('posts'));


    }
}
