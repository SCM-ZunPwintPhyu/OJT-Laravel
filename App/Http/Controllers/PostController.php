<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;
use Hash;
use App\Post;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use App\Imports\ValidateCsvFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostServiceInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function index(Request $request)
    {
        $data = $this->postInterface->getPostList($request);
        $count =$data->count();
        return view('post.index',compact('data','count'));
    }

    public function create() {
        return view('post.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:20',
            'description'=>'required|max:70',
        ]);
        $post = $this->postInterface->createPost($request);
        return redirect()->route('post')
                ->with('success','Post added successful!.');        
    }

    public function show() {
        return view('post.show');
    }

    public function edit($id){
        $post = $this->postInterface->postByID($id);
        return view('post.edit',compact('post'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'title'=>'required|max:20',
            'description'=>'required|max:70',
        ]);

        if($request->has('status')) {
            $request->status = 1;
        }else {
            $request->status = 0;
        }
        $post = $this->postInterface->updatePost($request, $id);
        return redirect()->route('post')->with('success', 'Post Update successfully');
    }

    public function destroy($id)
    {
        $post = $this->postInterface->postDelete($id);
        return redirect('/post')->with('success', 'Post is successfully deleted');
    } 
    public function export(Request $request)
    {   
        $data = $this->postInterface->getPostList($request);
        return Excel::download(new PostsExport($data), 'searchresult.xlsx' );
    }
    public function showuploadFile() {
        return view('post.csv');
    }
    //csv file upload
    public function uploadFile(Request $request) {
        $file = $request->file('uploadfile');
        if($request->has('uploadfile')) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $filePath = $file->getRealPath();
            $valid_extension = array("csv");
            $maxFileSize = 2097152;
            if(in_array(strtolower($extension),$valid_extension)){
                if($fileSize <= $maxFileSize){
                    try {
                        Excel::import(new PostsImport, $filePath);
                        Storage::disk('public')->put(Auth::User()->id . '/csv/' .$filename,  File::get($file));
                        return redirect('post/');
                    }catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                        $failures = $e->failures();
                         
                        foreach ($failures as $failure) {
                            return redirect()->back()->withInput()->withErrors($failure->errors());
                        }
                    }
                }else {
                    return back()->with('error','The uploadfile size larger than 2MB.');
                }
            }else {
                return back()->with('error','The uploadfile must be a file of type: csv.');
            }
        }else {
            return back()->with('error','The uploadfile field is required.');
        }
    }
}