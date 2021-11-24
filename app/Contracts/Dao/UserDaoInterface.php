<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
  public function UserCreate($request);
  public function UserConfirm($request);
  public function UserList();
  public function UserDetail($id);
  public function UserEdit($id);
  public function UserUpdateConfirm($request);
  public function UserUpdate($id,$request);
  public function UserDelete($id);
  public function UserSearch($request);
  public function PasswordChange($request);
}
