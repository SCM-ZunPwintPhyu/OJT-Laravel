<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  //get user list
  public function getUserList();
  public function createUser($user);
  public function userByID($id);
  public function updateUser($user);
  public function userDelete($id);
  public function updateUserProfile($user);
  public function updateChangePass($user);
  public function userUpdatePass($user);
}
