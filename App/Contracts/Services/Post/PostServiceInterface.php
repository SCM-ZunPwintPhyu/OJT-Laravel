<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  //get user list
  public function getPostList($aa);
  public function getPostFrontend($aa);
  public function createPost($request);
  public function postByID($id);
  public function updatePost($request, $id);
  public function postDelete($id);
  public function csvUploadFile($request);
}
