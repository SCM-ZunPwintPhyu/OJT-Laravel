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
    public function changestatuspost(Request $request)
    {
        // dd($request->all());
        $posts = Post::find($request->post_id);
        $posts->status = $request->status;

        $posts->save();
        return response()->json(['success'=>'Post change successfully.']);
    }

    public function create() {
        return view('post.create');
    }
    
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'description' => 'required',
        ];

        $customMessage = [
            'title.required' => 'Please Write Title',
            'description.required' => 'Please Write Description',
        ];

        $this->validate($request, $rules, $customMessage);
        $user_id=Auth::user()->name;
        // $res = Post::create([
        //             'title'=>$request->title,
        //             'description'=>$request->description,
                    // 'created_user_id'=>$user_id,
                    // 'updated_user_id'=>"Not Update",
        //         ]);

        $res = $this->postInterface->createPost($request);
        return redirect()->route('post')
                ->with('success','Post added successful!.');        
        // return redirect()->route('post')
        //                 ->with('success','Post added successful!.');
    }


    public function show() {
        return view('post.show');
    }

    public function edit($id){
        $post = $this->postInterface->postByID($id);
        return view('post.edit',compact('post'));
        // $post = Post::find($id);
        // return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id) 
    {
        $post = Post::findOrFail($id);

        $rules = [
            'title'=>'required',
            'description' => 'required',
        ];

        $customMessage = [
            'title.required' => 'Please Fill Title',
            'description.required' => 'Please Fill Description',
        ];

        $this->validate($request, $rules, $customMessage);

        if($request->has('status')) {
            $request->status = 1;
        }else {
            $request->status = 0;
        }
        $user_id=Auth::user()->name;
        // dd($request->status);
        $arr = [
            'title'=> $request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'updated_user_id'=>$user_id,
        ];

        // dd($arr);

        $post->fill($arr)->save();
        $post = $this->postInterface->updatePost($request, $id);
        return redirect()->route('post')->with('success', 'Post Update successfully');
        // return redirect()->route('post')->with('success', 'Post Update successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/post')->with('success', 'Post is successfully deleted');
    }
    // public function csvCreate() {
    //     // dd("herer");
    //     return view('post.csv');
    // }
    // public function csvStore(Request $request)
    // {
         
    //     $target_dir = public_path() . '/uploads/CSV/';

    //     if(!File::isDirectory($target_dir)){
    //         File::makeDirectory($target_dir, 0777, true, true);
    //     }

    //     $fileup = "";
    //     if ($file = $request->file('csv')) {
    //         $extension = $file->getClientOriginalExtension();
    //         $destinationPath = public_path() . '/uploads/CSV/';
    //         $safeName = name . '.' . $extension;
    //         $file->move($destinationPath, $safeName);
    //         $fileup = $safeName;
    //     }

    //     $res = Post::create([
    //                 'csv' =>$fileup,
    //             ]);

    //     return redirect()->route('post')
    //                     ->with('success','CSV added successful!.');
    // }

    //export posts 
    public function export(Request $request)
    {   
        $data = $this->postInterface->getPostList($request);
        // $keyword = $request->header('keyword');
        // if($keyword != null){
        //     return Excel::download(new PostsExport($keyword), 'searchresult.xlsx' );
        // }
        // if($request->keyword != null) {
        //     return Excel::download(new PostsExport($request->keyword), 'searchresult.xlsx' );
        // }
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