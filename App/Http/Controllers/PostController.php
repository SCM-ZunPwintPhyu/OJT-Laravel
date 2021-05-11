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

    public function index(Request $request)
    {
        $data = $this->postInterface->getPostList();
        $count = $data->count();
        return view('post.index',compact('data','count'));


        // $data = new Post();
        // $count = $data->count();
        // $keyword = $request->title;
        // if($keyword!=''){
        //     $data = $data->where('title','like','%'.$keyword.'%');
        // }
        // $data=$data->orderBy('id','DESC')->paginate(5);
        // return view('post.index',compact('data','count'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
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
}
