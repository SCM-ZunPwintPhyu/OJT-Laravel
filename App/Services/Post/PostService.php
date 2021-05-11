<?php

namespace App\Services\Post;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  /**
   * Get User List
   * @param Object
   * @return $userList
   */
  public function getPostList()
  {
    return $this->postDao->getPostList();
  }

  public function createPost($request) {
    $post = new Post;
    $user_id=Auth::user()->name;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->created_user_id = $user_id;
    $post->updated_user_id = "Not Updated";
    return $this->postDao->createPost($post);
  }

  public function postByID($id) {
    return $this->postDao->postByID($id);
  }

  public function updatePost($request, $id) {
    $user_id=Auth::user()->name;
    $post = $this->postDao->postByID($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = $request->status;
    $post->updated_user_id = $user_id;
    return $this->postDao->updatePost($post);
  }
}
