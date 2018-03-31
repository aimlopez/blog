<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getPostsIndex(){
        return view('frontend.blog.index');
    }

    public function getSinglePostIndex($post_id, $end = 'frontend'){
        return view( $end .'.blog.single');
    }

    public function getCreatePost(){
        return view( 'admin.blog.create-post');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => "required|max:120|unique:posts",
            'author' => 'required|max:60',
            'post-content' => 'required'
        ]);

        $post = New Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['post-content'];
        $post->save();
        //attaching category

        return redirect()->route('admin.index')->with(['success' => 'Post succefully created']);
    }
}
