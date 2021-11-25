@extends('layouts.app')
@section('content')
<div class="container  mx-auto">
  <div class="row ">
    <div class="col-md-8 my-3 rounded shadow p-2 mb-5 bg-white rounded  mx-auto bg-white">
     <div class="card-header bg-gradient-primary">
          <h2 class="card-title  text-center">User Profile</h2>
        </div>
        <div class="form-group row my-3">
          <input type="hidden" id="id" name="id" value="{{ $user['id'] }}">
          <div class=" col-6 ">
            <img src="/img/{{ $user['profile'] }}" width="200" height="200" class="img-thumbnail" alt="avatar">
          </div>
          <div class="col-6">
            <a href="{{ route('user.edit',$user['id']) }}" class="btn btn-outline-primary  float-right">Edit Profile</a>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Name :</label>
          <label class="col-9 col-form-label">{{ $user['name'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Email :</label>
          <label class="col-9 col-form-label">{{ $user['email'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Role :</label>
          <label class="col-9 col-form-label">{{ $user['type'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Phone :</label>
          <label class="col-9 col-form-label">{{ $user['phone'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Date of birth :</label>
          <label class="col-9 col-form-label">{{ $user['dob'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Address :</label>
          <label class="col-9 col-form-label">{{ $user['address'] }}</label>
        </div>
     
    </div>

  </div>
</div>
@endsection