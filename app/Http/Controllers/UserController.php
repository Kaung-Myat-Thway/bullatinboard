<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contracts\Services\UserServiceInterface;

class UserController extends Controller
{


    private $userInterface;

    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return $users object
     */
    public function index()
    {
        $users = $this->userInterface->UserList();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view create.blade.php
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect with success message
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = $this->userInterface->userCreate($request);
        return redirect('/user')->with('status', 'User Created Successfully!');
    }

    /**
     * Confrim a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $user object
     */
    public function confirm(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:password|min:6',
            'cpassword' => 'required|same:password|min:6',
            'phone' => 'required',
            'date' => 'required',
            'address' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,PNG|max:2048',
        ]);

        $user = $this->userInterface->UserConfirm($request);
        return view('users.confirm', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return $user object
     */
    public function show($id)
    {
        $user = $this->userInterface->UserDetail($id);

        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return $user object
     */
    public function edit($id)
    {
        $user = $this->userInterface->userEdit($id);

        return view('users.update', compact('user'));
    }

    /**
     * Confrim a new update resouce
     *
     * @param  $request
     * @return $user object
     */
    public function update_confirm(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'address' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,PNG|max:2048',
        ]);

        $user = $this->userInterface->UserUpdateConfirm($request);

        return view('users.update_confirm', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return redirect with success message
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $user = $this->userInterface->UserUpdate($id, $request);

        return redirect('/user')->with('message', 'You have successsfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return redirect with success message
     */
    public function destroy($id)
    {
        $user = $this->userInterface->UserDelete($id);

        return redirect('/user')->with('message', 'You have successsfully deleted!');
    }

    /**
     * User List Search data
     * 
     * @return user->index blade
     */
    public function search(Request $request)
    {
        $users = $this->userInterface->userSearch($request);

        if(count($users)>0)
        {
            return view('users.index', compact('users'))->withQuery($users);
        } else {
            return redirect('/user')->with('message','No Results found!');
        }
    }
}
