<?php

namespace App\Services\User;

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
  public function getUserList()
  {
    return $this->userDao->getUserList();
  }

  public function createUser($request) {
    $user = new User;
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
    return $this->userDao->createUser($user);
  }

  public function userByID($id) {
    return $this->userDao->userByID($id);
  }

  public function updateUser($request, $id) {
    $user = $this->userDao->userByID($id);
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
    return $this->userDao->updateUser($user);
  }
}
