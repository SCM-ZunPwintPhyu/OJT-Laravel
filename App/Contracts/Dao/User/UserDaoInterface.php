<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  //get user list
  public function getUserList();
  public function createUser($user);
  public function userByID($id);
  public function updateUser($user);
}
