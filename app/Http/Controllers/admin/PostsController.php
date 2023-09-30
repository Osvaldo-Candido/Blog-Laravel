<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    //
    public function show()
    {
        $posts = Post::latest()->paginate(6);
        return view('admin.posts.PostsView',compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.Create');
    }

    public function viewEdite($post)
    {
        $posts = Post::findOrFail($post);
        return view('admin.posts.Edite',compact('posts'));
    }

    public function update ($post, Request $request)
    {
            $post = Post::findOrFail($post);


            $data = $request->all();
            if($request->thumb){
                if($post->thumb) Storage::disk('public')->delete($post->thumb);

                $data['thumb'] = $request->thumb?->store('posts','public');
            }

            $post->update($data);
            return redirect()->route('admin.post.index');
    }

    public function destroy($post)
    {
            $post = Post::findOrFail($post);
            $post->delete();

            return redirect()->back();
    }
    public function store(Request $request)
    {
        /* Active record way
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->body = $request->body;
            $post->slug = Str::slug($post->title);
            $post->is_active = $request->is_active;

            $post->save(); */

            //Mass assigment way


            $data = $request->all();
            $data['thumb'] = $request->thumb?->store('posts','public');
            $data['slug'] = Str::slug($data['title']);
            Post::create($data);
            return redirect()->route('admin.post.index');
    }

}
