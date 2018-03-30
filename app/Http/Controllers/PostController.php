<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostsIndex(){
        return view('frontend.blog.index');
    }

    public function getSinglePostIndex($post_id, $end = 'frontend'){
        return view( $end .'.blog.single');
    }
}
