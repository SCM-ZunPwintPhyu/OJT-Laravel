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
  public function getUserList()
  {
    $users =  User::all();
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
}
