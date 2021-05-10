<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\Models\User;
use File;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
    	$data = new User();
        $count = $data->count();
        $data=$data->orderBy('id','DESC')->paginate(5);
        return view('user.index',compact('data','count'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create() {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email' => 'required',
            'password'=>'required',
        ];

        $customMessage = [
            'name.required' => 'Please Write Name',
            'email.required' => 'Please Write Email',
            'password.required' => 'Please Write Password',
        ];

        $this->validate($request, $rules, $customMessage);
        $destinationPath = public_path() . '/uploads/Profile/';

        $profile = "";
        //upload image
        $profile = $request->name;
        if ($file = $request->file('profile')) {
            $extension = $file->getClientOriginalExtension();

            $safeName = $profile . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $profile = $safeName;
        }

        $res = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'type'=>$request->type,
                    'phone'=>$request->phone,
                    'dob'=>$request->dob,
                    'address'=>$request->address,
                    'profile'=>$profile,
                ]);
                // dd($res);
        return redirect()->route('profile')
                        ->with('success','User added successful!.');
    }
    public function show() {
        return view('user.show');
    }
    public function edit($id)
    {
        $data = User::find($id);

    	return view('user.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {   
        // $this->validate($request, [
            // 'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$id,
            // 'type' => 'required',
            // 'phone' => 'required',
            // 'dob' => 'required',
            // 'address' => 'required',
            // 'profile' => 'required',
        // ]);


        // $user = User::find($id);

        // $user->update($input);

        // return redirect()->route('profile.index')
        //                 ->with('success','Profile updated successfully');

        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];

        $customMessage = [
            'name.required' => 'Please Fill name',
            'email.required' => 'Please Fill email',
        ];

        $this->validate($request, $rules, $customMessage);
       




        $target_dir = public_path() . '/uploads/Profile/';

        if(!File::isDirectory($target_dir)){
            File::makeDirectory($target_dir, 0777, true, true);
        }

    
        $structure = "uploads/Profile/";
        $profile = $user->profile;

        if ($profile = $request->file('profile')) {

            if ($profile->getClientOriginalExtension() == "jpg" || $profile->getClientOriginalExtension() == "jpeg" || $profile->getClientOriginalExtension() == "JPG" || $profile->getClientOriginalExtension() == "png" || $profile->getClientOriginalExtension() == "PNG" || $profile->getClientOriginalExtension() == "gif" || $profile->getClientOriginalExtension() == "GIF") {

                $photo = $profile->getClientOriginalName();
                $profile->move($structure, $photo);
            }
        }

        $arr = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'type'=>$request->type,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'address'=>$request->address,
            'profile'=>$profile,
        ];

        // dd($arr);

        $user->fill($arr)->save();

        return redirect()->route('profile')->with('success', 'User Update successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/profile')->with('success', 'Profile is successfully deleted');
    }
}
