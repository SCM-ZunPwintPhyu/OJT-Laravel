<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;

class UserDao implements UserDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getUserList($user)
  {
    // $users =  User::all();
    // return $users;
    
    $users = new User();
    if ($user->name != '') {
      $users = $users->where('name','like','%'.$user->name.'%');
    }
    if ($user->email != '') {
      $users = $users->where('email','like','%'.$user->email.'%');
    }
  
    $from = $user->from;
    $to = $user->to;
    if(isset($from) && isset($to)) {
      $users =$users->whereBetween('created_at', [$from." 00:00:00",$to." 23:59:59"])->orderBy('id','DESC')->paginate(6);
    }elseif(isset($from) && !isset($to)) {
      $users = $users->where('created_at', '>=', $from." 00:00:00")->orderBy('id','DESC')->paginate(6);
    }elseif(!isset($from) && isset($to)) {
      $users =$users->where('created_at', '<=', $to." 23:59:59")->orderBy('id','DESC')->paginate(6);
    }

    else {
      $users = $users->orderBy('id','DESC')->paginate(6);
    }
    return $users;
  }

  public function createUser($user) {
    $user->save();
  }

  public function userByID($id) {
    $user = User::find($id);
    return $user;
  }

  public function updateUser($user) {
    $user->save();
  }

  public function userDelete($id) {
    $user = User::find($id);
    $user->delete();
    return $user;
  }

  public function updateUserProfile($user) {
    $user->save();
  }

  // change password
  public function updateChangePass($user) {
    $user->save();
  }

  // profile image upload
  public function confCreateImg($user) {
    return $user;
  }

  // confirm create profile image 
  public function confUserImage($user) {
    return $user;
  }
}