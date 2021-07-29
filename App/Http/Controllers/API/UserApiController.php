<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Hash;
use App\User;
use File;

class UserApiController extends BaseController
{

    private $userInterface;

    public function __construct(UserServiceInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    // user list
    public function index(Request $request) {
        $data = $this->userInterface->getUserList($request);
        return response()->json($data);
    }

    // user store
    public function store(Request $request) {
        
        if($request->name == null || $request->email == null||$request->password == null){
            // return view('user.create');
            return response()->json('please fill again');
        }
        else{
            $res = $this->userInterface->createUser($request);
            // return redirect()->route('profile'); 
            return response()->json($res);  
        }    
    }
    
    // show user
    public function show($id) {
        $data = $this->userInterface->userByID($id);
        return $data;
    }
    // user update
    public function update(Request $request, $id)
    {   
        $post = $this->userInterface->updateUser($request,$id);
        return response()->json($post);
    }

    // user delete
    public function destroy($id)
    {
        $user = $this->userInterface->userDelete($id);
        return response()->json($user);
    }

    // change password
    // public function changePass($id)
    // {
    //     $data = $this->userInterface->userByID($id);
    //     return response()->json($data);
    // }

    // update change password
    public function updateChangePass(Request $request, $id)
    {   
        // $this->validate($request,[
        //     'name'=>'required|max:20',
        //     'email'=>'required|email',
        // ]);
        $data = $this->userInterface->updateChangePass($request, $id);
        return response()->json($data);
    }

    // update profile change password
    public function userUpdatePass(Request $request, $id)
    {   
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ]);
        $data = $this->userInterface->updateChangePass($request, $id);
        return redirect()->route('user_show');
    }

     // user personal show data
     public function userShow() {
        return view('user.usershow');
    }

    // user personal edit data
    public function userEdit() {
        return view('user.useredit');
    }
    
    // user personal confirm edit data
    public function personalUserEdit(Request $request,$id) {
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ]);
        $data = $this->userInterface->confCreateImg($request,$id);
        return response()->json('data');
    }

    // user personal update data
    public function userUpdate(Request $request) {
        if($request->name == null || $request->email == null){
            return view('user.useredit');
        }
        else{
            $data = $this->userInterface->updateUserProfile($request);
            return redirect()->route('user_show'); 
        } 
    }

    // user personal password change
    public function userChangePass($id)
    {
        $data = $this->userInterface->userByID($id);
        return view('user.userpass',compact('data'));
    }

}