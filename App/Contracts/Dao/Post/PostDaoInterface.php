<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get user list
  public function getPostList($aa);
  public function createPost($post);
  public function postByID($id);
  public function updatePost($post);
}
