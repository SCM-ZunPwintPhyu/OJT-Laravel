<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class FrontendController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data = new Post();
    //     $count = $data->count();
    //     $keyword = $request->title;
    //     // dd($keyword);
    //     if($keyword!=''){
    //         $data = $data->where('title','like','%'.$keyword.'%');
    //     }
    //     // dd($keyword);
    //     $data = Post::latest()->paginate(6);
    //     return view('welcome',compact('data','count'))->with('i',(request()->input('page', 1) - 1) * 6);
    // }

    public function index(Request $request)
    {
        $data = new Post();
        $count = $data->count();
        $keyword = $request->title;
        if($keyword!=''){
            $data = $data->where('title','like','%'.$keyword.'%');
        }
        $data=$data->orderBy('id','DESC')->paginate(2);
        return view('welcome',compact('data','count'))
            ->with('i', ($request->input('page', 1) - 1) * 2);
    }
}


