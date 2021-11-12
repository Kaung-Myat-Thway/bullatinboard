<?php

namespace App\Dao\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{ 

  public function UserCreate($request)
  {
  
    $user = new User([
      'name' => $request->name,
      'email' => $request->email,
      'password' =>Hash::make( $request->password),
      'profile' => $request->profile,
      'type' => $request->type,
      'phone' => $request->phone,
      'address' => $request->  address,
      'dob' => $request-> date,
      'created_user_id' => $request->created_user_id,
      'updated_user_id' => $request->updated_user_id,
    ]);
    $user->save();

    return $user;
  }

  public function UserConfirm($request)
  {
  
    $img = time().'.'.$request->profile->extension();  
        $request->profile->move(public_path('img'), $img);
        $users=['name' => $request->name,
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

  public function UserList()
  {
    $users=User::all();
    return $users;
  }
  
}