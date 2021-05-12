<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Post;

class PostDao implements PostDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getPostList()
  {
    // $posts =  Post::all();
    $posts = new Post();
    $posts=$posts->orderBy('id','DESC')->paginate(5);
    return $posts;
  }

  public function createPost($post) {
    $post->save();
  }

  public function postByID($id) {
    $post = Post::find($id);
    return $post;
  }

  public function updatePost($post) {
    $post->save();
  }
}