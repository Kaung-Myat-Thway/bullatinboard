<?php

namespace App\Contracts\Services;

interface UserServiceInterface
{
  public function UserCreate($request);
  public function UserConfirm($request);
  public function UserList();

}