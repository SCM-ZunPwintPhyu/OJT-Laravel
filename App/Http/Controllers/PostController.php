<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;
use Hash;
use App\Post;
use App\Models\User;

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
        return view('post.index',compact('data'));
    }

    // post create
    public function create() {
        return view('post.create');
    }

    // create confirm 
    public function confCreate(Request $request) {
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'required|max:200',
        ]);
        $post = $request;
        return view('post.confcreate',compact('post'));
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

    // post edit
    public function edit($id){
        $post = $this->postInterface->postByID($id);
        return view('post.edit',compact('post'));
    }

    // edit confirm 
    public function confEdit(Request $request) {
        $this->validate($request,[
            'title'=>'required|max:50',
            'description'=>'required|max:200',
        ]);
        $post = $request;
        if($request->has('status')) {
            $post->status = 1;
        }else {
            $post->status = 0;
        }
        return view('post.confedit',compact('post'));
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