<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
  public function UserCreate($request);
  public function UserConfirm($request);
  public function UserList();

}
