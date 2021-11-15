<?php

namespace App\Contracts\Dao;

interface PostDaoInterface
{
  public function PostCreate($request);
  public function PostConfirm($request);
  public function PostList();
  public function PostEdit($id);
  public function UpdateConfirm($request);
  public function PostUpdate($request,$id);
  public function PostDelete($id);
  public function PostSearch($request);

}