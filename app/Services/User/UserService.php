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

}