@extends('layouts.app')
@section('content')
  <div class="container my-3 pb-5">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h2 class="text-primary my-3">Create User Confirmation </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row mt-3">
            <div class="col-sm-9">
              <img src="/img/{{ $user['profile'] }}" class="avatar img-circle img-thumbnail rounded-circle" width="150px" alt="Profile">
              <input type="hidden" value="{{$user['profile']}}" name="profile" id="profile">
            </div>
          </div>
          <div class="form-group row">
             <label for="name" class="col-sm-3 col-form-label text-primary">Name :</label>
             <div class="col-sm-9">
               <input type="text"  class="font-weight-bold form-control border-0" id="name" name="name" value="{{ $user['name'] }}">
             </div>
          </div>
         <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label text-primary">Email Address :</label>
            <div class="col-sm-9">
            <input type="email"  class="font-weight-bold form-control border-0" id="email" name="email" value="{{ $user['email'] }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label text-primary">Password :</label>
            <div class="col-sm-9">
              <input type="password"  class="font-weight-bold form-control border-0" id="password" name="password" value="{{ $user['password'] }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label text-primary">Type :</label>
            <div class="col-sm-9">
            <input type="text"  class="font-weight-bold form-control border-0" id="type" name="type" value="{{ $user['type'] }}">
            </div>
         </div>
         <div class="form-group row">
          <label for="phone" class="col-sm-3 col-form-label text-primary">Phone Number :</label>
          <div class="col-sm-9">
          <input type="text"  class="font-weight-bold form-control border-0" id="phone" name="phone" value="{{ $user['phone'] }}">
          </div>
        </div>
         <div class="form-group row">
          <label for="date" class="col-sm-3 col-form-label text-primary">Date of Birth :</label>
          <div class="col-sm-9">
            <input type="text" id="date" name="date" data-date-format="mm/dd/yyyy" class="font-weight-bold form-control border-0" value="{{ $user['date'] }}">
          </div>
       </div>
       <div class="form-group row">
          <label for="address" class="col-sm-3 col-form-label text-primary">Address :</label>
          <div class="col-sm-9">
            <textarea class="font-weight-bold form-control border-0" name="address" id="address"  rows="3">{{ $user['address'] }}</textarea>
          </div>
       </div>
       <input type="hidden" value="1" name="created_user_id">
       <input type="hidden" value="1" name="updated_user_id">
         <button class="btn btn-primary my-3" type="submit">Confirm</button>
         <a href="{{ url('user/create') }}" class="btn btn-outline-primary mx-3">Cancel</a>
        </form>
      </div>
    </div>
    </div>
  </div>
@endsection
