<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function getcontactIndex(){
        return view('frontend.blog.contact');
    }
}
