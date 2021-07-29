<?php

namespace App\Services\Post;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use App\Imports\ValidateCsvFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  /**
   * Get User List
   * @param Object
   * @return $userList
   */

  //  post list
  public function getPostList($aa)
  {
    return $this->postDao->getPostList($aa);
  }

  // frontend post list
  public function getPostFrontend($aa)
  {
    return $this->postDao->getPostFrontend($aa);
  }

  // create post
  public function createPost($request) {
    $post = new Post;
    // $user_id=Auth::user()->name;
    $post->title = $request->title;
    $post->description = $request->description;
    // $post->created_user_id = Auth::user();
    $post->created_user_id = "Admin";
    $post->updated_user_id = "Not Updated";
    return $this->postDao->createPost($post);
  }

  // find id
  public function postByID($id) {
    return $this->postDao->postByID($id);
  }

  // update post
  public function updatePost($request, $id) {
    // $user_id=Auth::user()->name;
    $post = $this->postDao->postByID($id);
    if($request->has('status')) {
      $request->status = 1;
    }else {
        $request->status = 0;
    }
    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = $request->status;
    $post->updated_user_id = "Admin";
    // $post->updated_user_id = $user_id;
    return $this->postDao->updatePost($post);
  }

  // delete post
  public function postDelete($id) {
    return $this->postDao->postDelete($id);
  }

  // csvuploadfile
  public function csvUploadFile($request) {
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