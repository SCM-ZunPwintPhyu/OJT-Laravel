<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  //get user list
  public function getPostList();
  public function createPost($request);
  public function postByID($id);
  public function updatePost($request, $id);
}
