<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserDao implements UserDaoInterface
{

  /**
   * create user function
   *
   * @return $user object
   */
  public function UserCreate($request)
  {
   
    $user = new User([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'profile' => $request->profile,
      'type' => $request->type,
      'phone' => $request->phone,
      'address' => $request->address,
      'dob' => $request->date,
      'created_user_id' => Auth::user()->id,
      'updated_user_id' => Auth::user()->id,
    ]);
    $user->save();

    return $user;
  }

  /**
   * create confirm function
   *
   * @return $user object
   */
  public function UserConfirm($request)
  {

    $img = time() . '.' . $request->profile->extension();
    $request->profile->move(public_path('img'), $img);
    $users = [
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
      'cpassword' => $request->cpassword,
      'phone' => $request->phone,
      'type' => $request->type,
      'date' => $request->date,
      'address' => $request->address,
      'profile' => $img,
    ];

    return $users;
  }

  /**
   * show all user list 
   *
   * @return $users object
   */
  public function UserList()
  {
    $users = User::where('deleted_user_id',null)->latest()->paginate(5);
    return $users;
  }

  /**
   * show detail user 
   *
   * @return $user
   */
  public function UserDetail($id)
  {
    $user = User::find($id);
    if ($user->type == 0) {
      $user->type = 'Admin';
    } else {
      $user->type = 'User';
    }

    return $user;
  }

  /**
   * edit user function
   *
   * @return $user
   */
  public function UserEdit($id)
  {
    $user = User::find($id);
    return $user;
  }

  /**
   * edit user update confirm function
   *
   * @return $users object
   */
  public function UserUpdateConfirm($request)
  {
    $img = time() . '.' . $request->profile->extension();
    $request->profile->move(public_path('img'), $img);
    $users = [
      'id' => $request->id,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'type' => $request->type,
      'date' => $request->date,
      'address' => $request->address,
      'profile' => $img,
    ];

    return $users;
  }

  /**
   * user update function
   *
   * @return $user
   */
  public function UserUpdate($id, $request)
  {
    if ($request->type == 'Admin') {
      $request->type = 0;
    } else {
      $request->type = 1;
    }
    $user = User::find($id);
    $user->name =  $request->name;
    $user->email = $request->email;
    $user->profile = $request->profile;
    $user->type = $request->type;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->dob = $request->date;
    $user->updated_user_id = Auth::user()->id;
    $user->save();

    return $user;
  }

  /**
   * user delete function
   *
   * @return $user
   */
  public function UserDelete($id)
  {

    $user = User::find($id);
    $user->deleted_user_id = Auth::user()->id;
    $user->deleted_at = now();
    $user->save();

    return $user;
  }
    /**
   * search function
   *
   * @return $users
   */
  public function UserSearch($request)
  {
    $name=$request->input('name');
    if($name){
        $users = User::where('name', 'LIKE', "%" . $name . "%");
    }
    $email=$request->input('email');
    if($email){
        $users = User::where('email', 'LIKE', "%" . $email . "%");
    }
    $created_from=$request->input('created_from');
    $created_to=$request->input('created_to');
    if( $created_from && $created_to ){
        $users = User::where('created_at', '>=', $created_from )
                     ->where('created_at', '<=',$created_to );
    }
    else if($created_from){
      $users = User::where('created_at', 'LIKE', "%" . $created_from . "%");
    }
    else if($created_to){
      $users = User::where('created_at', 'LIKE', "%" . $created_to . "%");
    }
    $users = $users->paginate(5);

    return $users;
  }
}
