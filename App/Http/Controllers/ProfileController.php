<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;

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
    public function index() {
        $data = $this->userInterface->getUserList();
        $count = $data->count();
        return view('user.index',compact('data','count'));
    }

    // user create
    public function create() {
        return view('user.create');
    }

    // user store
    public function store(Request $request) {
                $this->validate($request,[
                    'name'=>'required|max:20',
                    'email'=>'required|max:70',
                    'password'=>'required|max:70',
                ]);
                $res = $this->userInterface->createUser($request);
                return redirect()->route('profile')
                        ->with('success','User added successful!.');
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

    // user update
    public function update(Request $request, $id)
    {   
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|max:70',
        ]);
        $data = $this->userInterface->updateUser($request, $id);
        return redirect()->route('profile')->with('success', 'User Update successfully');
    }

    // user delete
    public function destroy($id)
    {
        $user = $this->userInterface->userDelete($id);
        return redirect('/profile')->with('success', 'User is successfully deleted');
    }

    // change password
    public function changePass($id)
    {
        $data = $this->userInterface->userByID($id);
        return view('user.password',compact('data'));
    }
}