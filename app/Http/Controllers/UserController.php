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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= $this->userInterface->UserList();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $user=$this->userInterface->userCreate($request);
        return redirect('/user')->with('status','User Creted Successfully!');
    }

    public function confirm(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|same:password|min:6',
            'cpassword'=>'required|same:password|min:6',
            'phone'=>'required',
            'date'=>'required',
            'address'=>'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,PNG|max:2048',
        ]);

        $user=$this->userInterface->UserConfirm($request);
        return view('users.confirm',compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
