<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(){
        
        return view('post.indexHome')
                ->with('posts',post::all())
                ->with('page','post');
    }
}
