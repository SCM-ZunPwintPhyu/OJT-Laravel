<?php

namespace App\Services\User;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;

  /**
   * Class Constructor
   * @param OperatorUserDaoInterface
   * @return
   */
  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  /**
   * Get User List
   * @param Object
   * @return $userList
   */

  //  user list
  public function getUserList()
  {
    return $this->userDao->getUserList();
  }

  // create user
  public function createUser($request) {
    $user = new User;
    $destinationPath = public_path() . '/uploads/Profile/';
    $profile = "";
    $profile = $request->name;
    if ($file = $request->file('profile')) {
        $extension = $file->getClientOriginalExtension();

        $safeName =$request->name. '.' ."PNG";
        $file->move($destinationPath, $safeName);
        $profile = $safeName;
    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    if($request->type == 'Admin') {
      $user->type = '0';
    }else {
      $user->type = '1';
    }
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->dob = $request->dob;
    $user->profile = $profile;
    return $this->userDao->createUser($user);
  }

  // find id
  public function userByID($id) {
    return $this->userDao->userByID($id);
  }

  // update user
  public function updateUser($request, $id) {
    $user = $this->userDao->userByID($id);
    
    $target_dir = public_path() . '/uploads/Profile/';

    if(!File::isDirectory($target_dir)){
        File::makeDirectory($target_dir, 0777, true, true);
    }


    $structure = "uploads/Profile/";
    $profile = $user->profile;

    
    if ($profile = $request->file('profile')) {
      // dd("herk");
        if ($profile->getClientOriginalExtension() == "jpg" || $profile->getClientOriginalExtension() == "jpeg" || $profile->getClientOriginalExtension() == "JPG" || $profile->getClientOriginalExtension() == "png" || $profile->getClientOriginalExtension() == "PNG" || $profile->getClientOriginalExtension() == "gif" || $profile->getClientOriginalExtension() == "GIF") {

            $photo = $request->name. '.' ."PNG";
            $profile->move($structure, $photo);
        }
    }




    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    if($request->type == 'Admin') {
      $user->type = '0';
    }else {
      $user->type = '1';
    }
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->dob = $request->dob;
    $profile = $profile;
    return $this->userDao->updateUser($user);
  }

  // user delete
  public function userDelete($id) {
    return $this->userDao->userDelete($id);
  }
}