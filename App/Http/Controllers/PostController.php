<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;
use Hash;
use App\Post;
use App\Models\User;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\PostsExport;
// use App\Imports\PostsImport;
// use App\Imports\ValidateCsvFile;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostServiceInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    // post list
    public function index(Request $request)
    {
        $data = $this->postInterface->getPostList($request);
        // $count =$data->count();
        return view('post.index',compact('data'));
    }

    // post create
    public function create() {
        return view('post.create');
    }
    
    // post store
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'required|max:200',
        ]);
        $post = $this->postInterface->createPost($request);
        return redirect()->route('post')
                ->with('success','Post added successful!.');        
    }

    // show post
    public function show() {
        return view('post.show');
    }

    // post edit
    public function edit($id){
        $post = $this->postInterface->postByID($id);
        return view('post.edit',compact('post'));
    }

    // post update
    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'required|max:200',
        ]);
        $post = $this->postInterface->updatePost($request, $id);
        return redirect()->route('post')->with('success', 'Post Update successfully');
    }

    // post delete
    public function destroy($id)
    {
        $post = $this->postInterface->postDelete($id);
        return redirect('/post')->with('success', 'Post is successfully deleted');
    } 

    // file export
    public function export(Request $request)
    {   
        $data = $this->postInterface->getPostList($request);
        return Excel::download(new PostsExport($data), 'searchresult.xlsx' );
    }

    // showuploadFile
    public function showuploadFile() {
        return view('post.csv');
    }

    //csv file upload
    public function uploadFile(Request $request) {
        $post = $this->postInterface->csvUploadFile($request);
        return redirect()->route('post')
                ->with('success','File Update successful!.');
    }
}