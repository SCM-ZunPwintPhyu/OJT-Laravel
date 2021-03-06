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

  // postlist for backend
  public function getPostList($aa)
  {
    $posts = new Post();
    if ($aa->title != '') {
      $posts = $posts->where('title','like','%'.$aa->title.'%');
    }
    if ($aa->description != '') {
      $posts = $posts->where('description','like','%'.$aa->description.'%');
    }
    if ($aa->created_user_id != '') {
      $posts = $posts->where('created_user_id','like','%'.$aa->created_user_id.'%')->orderBy('id','DESC')->paginate(5);
    }
    else {
      $posts = $posts->orderBy('id','DESC')->paginate(5);
    }
    return $posts;
  }

  // postlist for frontend
  public function getPostFrontend($aa)
  {
    $posts = new Post();
    if ($aa->title != '') {
      $posts = $posts->where('title','like','%'.$aa->title.'%')
                    ->where('status','like','1');
    }
    if ($aa->description != '') {
      $posts = $posts->where('description','like','%'.$aa->description.'%')
                      ->where('status','like','1');
    }
    if ($aa->created_user_id != '') {
      $posts = $posts->where('created_user_id','like','%'.$aa->created_user_id.'%')->orderBy('id','DESC')->paginate(5);
    }
    else {
      $posts = $posts->where('status','like','1')->orderBy('id','DESC')->paginate(5);
    }
    return $posts;
  }

  // create post
  public function createPost($post) {
    $post->save();
  }

  // find by post id
  public function postByID($id) {
    $post = Post::find($id);
    return $post;
  }

  // update post
  public function updatePost($post) {
    $post->save();
  }

  // delete post
  public function postDelete($id) {
    $post = Post::find($id);
    $post->delete();
    return $post;
  }

  // delete csvUploadFile
  public function csvUploadFile($post) {
    $post->save();
  }
}