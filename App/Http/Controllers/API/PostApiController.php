<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Contracts\Services\Post\PostServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostApiController extends BaseController
{
    private $postInterface;

    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    // post list
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return response()->json($posts);
    }

    // public function search(Request $request)
    // { 
    //     $search_data = $request->search_data;
    //     $posts = $this->postInterface->getPostList($search_data);
    //     return response()->json($posts);
    // }

    public function store(Request $request)
    {
        if ($request->description == null || $request->title == null) {
            return response()->json('please fill again');
        } else {
            $post = $this->postInterface->createPost($request);
            return response()->json($post);
        }
    }


    public function show($id)
    {
        $post = $this->postInterface->postByID($id);
        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = $this->postInterface->updatePost($request,$id);
        return response()->json($post);
    }


    // post delete
    public function destroy($id)
    {
        $post = $this->postInterface->postDelete($id);
        return response()->json($post);
    }


    // file export
    public function export(Request $request)
    {
        $data = $this->postInterface->getPostList($request);
        return Excel::download(new PostsExport($data), 'searchresult.xlsx');
    }

    // showuploadFile
    public function showuploadFile()
    {
        return view('post.csv');
    }

    //csv file upload
    public function uploadFile(Request $request)
    {
        $post = $this->postInterface->csvUploadFile($request);
        return response()->json($post);
    }
}
