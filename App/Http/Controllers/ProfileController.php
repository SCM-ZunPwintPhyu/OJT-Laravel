<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Hash;
use App\Models\User;
use File;

class ProfileController extends Controller
{

    private $userInterface;

    public function __construct(UserServiceInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    // user list
    public function index(Request $request) {
        $data = $this->userInterface->getUserList($request);
        return view('user.index',compact('data'));
    }

    // user create
    public function create() {
        return view('user.create');
    }

    // create confirm 
    public function confCreate(Request $request) {
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|unique:users|email',
            'password'=>'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8'
        ]);
        $data = $this->userInterface->confUserImage($request);
        return view('user.confcreate',compact('data'));
    }

    // user store
    public function store(Request $request) {
        
        if($request->name == null || $request->email == null||$request->password == null ||$request->password_confirmation == null){
            return view('user.create');
        }
        else{
            $res = $this->userInterface->createUser($request);
            return redirect()->route('profile');   
        }    
    }
    
    // show user
    public function show($id) {
        $data = $this->userInterface->userByID($id);
        return view('user.show',compact('data'));
    }

    // edit user
    public function edit($id) {
        $data = $this->userInterface->userByID($id);
        return view('user.edit',compact('data'));
    }

    // edit confirm 
    public function confEdit(Request $request,$id) {
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ]);
        $data = $this->userInterface->confCreateImg($request,$id);
        return view('user.confedit',compact('data'));
    }

    // user update
    public function update(Request $request, $id)
    {   
        if($request->name == null || $request->email == null){
            $data = $this->userInterface->userByID($id);
            return view('user.edit',compact('data'));
        }
        else{
            $data = $this->userInterface->updateUser($request, $id);
            return redirect()->route('profile');   
        } 
    }

    // user delete
    public function destroy($id)
    {
        $user = $this->userInterface->userDelete($id);
        return redirect('/profile');
    }

    // change password
    public function changePass($id)
    {
        $data = $this->userInterface->userByID($id);
        return view('user.password',compact('data'));
    }

    // update change password
    public function updateChangePass(Request $request, $id)
    {   
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ]);
        $data = $this->userInterface->updateChangePass($request, $id);
        return redirect()->route('profile');
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
        return view('user.confuseredit',compact('data'));
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