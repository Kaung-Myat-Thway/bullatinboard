@extends('layouts.app')
@section('content')
<div class="container mb-5 mx-auto">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h2 class="text-primary my-3 font-weight-bold">User Profile</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form action="" method="POST" class="mb-5 mx-auto" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mt-3 mb-3">
          <input type="hidden" id="id" name="id" value="{{ $user['id'] }}">
          <div class="col-sm-4">
            <img src="/img/{{ $user['profile'] }}" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
          </div>
          <div class="col-sm-5"></div>
          <div class="col-sm-3 mt-5">
            <a href="{{ route('user.edit',$user['id']) }}" class="btn btn-outline-primary mt-5 float-right">Edit Profile</a>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-4 col-form-label text-primary">Name :</label>
          <div class="col-sm-8">
            <input type="text" class="font-weight-bold form-control border-0" id="name" name="name" value="{{ $user['name'] }}" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label text-primary">Email Address :</label>
          <div class="col-sm-8">
            <input type="email" class="font-weight-bold form-control border-0" id="email" name="email" value="{{ $user['email'] }}" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="type" class="col-sm-4 col-form-label text-primary">Type :</label>
          <div class="col-sm-8">
            <input type="text" class="font-weight-bold form-control border-0" id="type" name="type" value="{{ $user['type'] }}" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label text-primary">Phone Number :</label>
          <div class="col-sm-8">
            <input type="text" class="font-weight-bold form-control border-0" id="phone" name="phone" value="{{ $user['phone'] }}" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label text-primary">Date of Birth :</label>
          <div class="col-sm-8">
            <input type="text" id="date" name="date" data-date-format="mm/dd/yyyy" class="font-weight-bold form-control border-0" value="{{ $user['dob'] }}" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label text-primary">Address :</label>
          <div class="col-sm-8">
            <input type="text" id="address" name="address" class="font-weight-bold form-control border-0" value="{{ $user['address'] }}" disabled>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection