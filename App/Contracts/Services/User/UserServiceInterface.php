<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
  //get user list
  public function getUserList($request);
  public function createUser($request);
  public function userByID($id);
  public function updateUser($request, $id);
  public function userDelete($id);
  public function updateUserProfile($request);
  public function updateChangePass($request, $id);
  public function userUpdatePass($request, $id);
}
