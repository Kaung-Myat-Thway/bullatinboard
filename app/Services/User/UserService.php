<?php

namespace App\Services\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get User List
     * @param Object
     * @return $userList
     */

    public function UserCreate($request)
    {
        return $this->userDao->UserCreate($request);
    }

    public function UserConfirm($request)
    {
        return $this->userDao->UserConfirm($request);
    }

    public function UserList()
    {
        return $this->userDao->UserList();
    }

    public function UserDetail($id)
    {
        return $this->userDao->UserDetail($id);
    }

    public function UserEdit($id)
    {
        return $this->userDao->UserEdit($id);
    }

    public function UserUpdateConfirm($request)
    {
        return $this->userDao->UserUpdateConfirm($request);
    }

    public function UserUpdate($id, $request)
    {
        return $this->userDao->UserUpdate($id, $request);
    }

    public function UserDelete($id)
    {
        return $this->userDao->UserDelete($id);
    }

    public function userSearch($request)
    {
      return $this->userDao->userSearch($request);
    }
  
}
