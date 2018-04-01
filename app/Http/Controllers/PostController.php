<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Index pages
     */
    public function getPostsIndex()
    {
        $posts = Post::paginate(5);
        foreach ($posts as $post) {
           $post->body = $this->shortenText($post->body, 20);
        }
        return view('frontend.blog.index', ['posts' => $posts]);
    }

    public function getAdminPostsIndex() 
    {
        $posts = Post::paginate(5);
        return view('admin.blog.all-posts', ['posts' => $posts]);
    }

    /**
     * Single page
     */
    public function getSinglePostIndex($post_id, $end = 'frontend')
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index')->with(['fail' => 'This post not exist']);
        }
        return view( $end .'.blog.single', ['post' => $post]);
    }

    
    /**
     * Create Post 
     * getCreatePost : function to show the form
     * store . Save a new post
     */

    public function getCreatePost()
    {
        return view( 'admin.blog.create-post');
    }

    public function store(Request $request)
    {

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

    /**
     * Edit Post
     */

    public function getUpdatePost($post_id) 
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index')->with(['fail' => 'This post not exist']);
        }

        
        return view( 'admin.blog.edit-post', ['post' => $post]);
    }

    public function postUpdatePost(Request $request) 
    {
        $this->validate($request, [
            'title' => "required|max:120",
            'author' => 'required|max:60',
            'post-content' => 'required'
        ]);

        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['post-content'];
        $post->update();
        return redirect()->route('admin.index')->with(['success' => 'Post succefully updated']);
        //categories
    }

    /**
     * Delete function
     */

    public function destroy($post_id){
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('admin.index')->with(['fail' => 'This post not exist']);
        }

        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post succefully deleted']);
    }
    /**
     * Other functions
     */
    private function shortenText($text, $words_count)
    {
        if (str_word_count($text, 0) > $words_count) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$words_count]) . '...' ;
           
        }
        return $text;
    }
}
