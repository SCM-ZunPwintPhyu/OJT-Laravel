<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;
use Hash;
use App\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class FrontendController extends Controller
{
    private $postInterface;

    public function __construct(PostServiceInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function index(Request $request)
    {
        $data = $this->postInterface->getPostFrontend($request);
        $count =$data->count();
        return view('welcome',compact('data','count'));
        
        // $data = new Post();
        // $keyword = $request->title;
        // $keyword1 = $request->description;
        // $keyword2 = $request->created_user_id;
        // if($keyword!=''){
        //     $data = $data->where('title','like','%'.$keyword.'%');
        // }
        // if($keyword1!=''){
        //     $data = $data->where('description','like','%'.$keyword1.'%');
        // }
        // if($keyword2!=''){
        //     $data = $data->where('created_user_id','like','%'.$keyword2.'%');
        // }
        // $data = $data->where('status','like','1')->orderBy('id','DESC')->paginate(5);
        // $count = $data->count();
        // return view('welcome',compact('data','count'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}