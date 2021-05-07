<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
    	return view('post.index');
        // return view ('post.create');
    }

    public function create() {
        return view('post.create');
    }

    public function show() {
        return view('post.show');
    }

    public function edit(Request $request) {
        return view('post.edit');
    }
}
