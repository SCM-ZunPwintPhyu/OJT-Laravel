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
  public function getPostList($aa)
  {
    $posts = new Post();
    if ($aa->title != '') {
      $posts = $posts->where('title','like','%'.$aa->title.'%')->orderBy('id','DESC')->paginate(5);
    }
    elseif ($aa->description != '') {
      $posts = $posts->where('description','like','%'.$aa->description.'%')->orderBy('id','DESC')->paginate(5);
    }
    elseif ($aa->created_user_id != '') {
      $posts = $posts->where('created_user_id','like','%'.$aa->created_user_id.'%')->orderBy('id','DESC')->paginate(5);
    }
    else {
      $posts = $posts->orderBy('id','DESC')->paginate(5);
    }
    return $posts;
  }
  public function getPostFrontend($aa)
  {
    $posts = new Post();
    if ($aa->title != '') {
      $posts = $posts->where('title','like','%'.$aa->title.'%')
                    ->where('status','like','1')
                    ->orderBy('id','DESC')->paginate(5);
    }
    elseif ($aa->description != '') {
      $posts = $posts->where('description','like','%'.$aa->description.'%')
                      ->where('status','like','1')
                      ->orderBy('id','DESC')->paginate(5);
    }
    elseif ($aa->created_user_id != '') {
      $posts = $posts->where('created_user_id','like','%'.$aa->created_user_id.'%')->orderBy('id','DESC')->paginate(5);
    }
    else {
      $posts = $posts->where('status','like','1')->orderBy('id','DESC')->paginate(5);
    }
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