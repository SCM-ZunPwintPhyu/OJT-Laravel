<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $data = new Post();
        $keyword = $request->title;
        $keyword1 = $request->description;
        $keyword2 = $request->created_user_id;
        if($keyword!=''){
            $data = $data->where('title','like','%'.$keyword.'%');
        }
        if($keyword1!=''){
            $data = $data->where('description','like','%'.$keyword1.'%');
        }
        if($keyword2!=''){
            $data = $data->where('created_user_id','like','%'.$keyword2.'%');
        }
        $data = $data->where('status','like','1')->orderBy('id','DESC')->paginate(5);
        $count = $data->count();
        return view('welcome',compact('data','count'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}