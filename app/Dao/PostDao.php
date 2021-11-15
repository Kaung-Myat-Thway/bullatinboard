<?php

namespace App\Dao;

use App\Contracts\Dao\PostDaoInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostDao implements PostDaoInterface
{
  /**
   * create post function
   *
   * @return $post object
   */

  public function PostCreate($request)
  {
    $post = new Post([
      'title' => $request->get('title'),
      'description' => $request->get('description'),
      'status' => $request->get('status'),
      'create_user_id' => Auth::user()->id,
      'updated_user_id' => Auth::user()->id
    ]);
    $post->save();

    return $post;
  }

  /**
   * create post confirm function
   *
   * @return $data object
   */
  public function PostConfirm($request)
  {
    $data = [
      'title' => $request->title,
      'description' => $request->description,
    ];

    return $data;
  }

  /**
   * show post function
   *
   * @return $data object
   */
  public function PostList()
  {
    $id = Auth::user()->id;
    $user_type = User::find($id);
    if ($user_type->type == 0) {
      $data = Post::where('deleted_user_id', null)
        ->latest()
        ->paginate(5);
    } else {
      $data = Post::where('deleted_user_id', null)->where('create_user_id', '=', $id)
        ->latest()
        ->paginate(5);
    }
    return $data;
  }

  /**
   * edit post function
   *
   * @return $post object
   */
  public function PostEdit($id)
  {
    $post = Post::find($id);

    return $post;
  }

  /**
   * update confirm post function
   *
   * @return $data object
   */
  public function UpdateConfirm($request)
  {
    if ($request->status == 'on') {
      $status = 1;
    }
    $data = [
      'id' => $request->id,
      'title' => $request->title,
      'description' => $request->description,
      'status' => $status,
      'create_user_id' => $request->create_user_id,
      'updated_user_id' => $request->updated_user_id,
    ];

    return $data;
  }

  /**
   * update post function
   *
   * @return $post object
   */
  public function PostUpdate($request, $id)
  {
    $post = Post::find($id);
    $post->title = $request->title;
    $post->description = $request->get('description');
    $post->status = $request->get('status');
    $post->updated_user_id = Auth::user()->id;
    $post->save();

    return $post;
  }
   /**
   * delete post function
   *
   * @return $post object
   */
  public function PostDelete($id)
  {
    $post = Post::find($id);
    $post->deleted_user_id=Auth::user()->id;
    $post->deleted_at=now();
    $post->save();

    return $post;
  }

  public function PostSearch($request)
  {
    $search=$request->input('search');
    // $posts = Post::where('title','LIKE','%'.$search.'%')
    //         ->orWhere('description','LIKE','%'.$search.'%')->get();

    $posts = Post::where('title','LIKE','%'.$search.'%')
            ->orWhere('description','LIKE','%'.$search.'%')->paginate(2);   
    return $posts;
  }
}
