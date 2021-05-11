<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get user list
  public function getPostList();
  public function createPost($post);
  public function postByID($id);
  public function updatePost($post);
}
