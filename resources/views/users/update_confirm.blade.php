@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-8 my-3 rounded shadow p-2 mb-5 bg-white rounded  mx-auto bg-white">
     <div class="card-header bg-gradient-primary">
          <h2 class="card-title  text-center">Update Confirm</h2>
        </div>
        <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        
        <div class="form-group row my-3">
          <input type="hidden" id="id" name="id" value="{{ $user['id'] }}">
          <div class=" col-6 ">
            <img src="/img/{{ $user['profile'] }}" width="200" height="200" class="img-thumbnail" alt="avatar">
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
          <label class="col-9 col-form-label">{{ $user['date'] }}</label>
        </div>
        <div class="form-group row">
          <label class="col-3 col-form-label">Address :</label>
          <label class="col-9 col-form-label">{{ $user['address'] }}</label>
        </div>
        .<div class="form-group">
        <button class="btn btn-primary my-3" type="submit">Confirm</button>
        <a href="{{ route('user.edit',$user['id']) }}" class="btn btn-danger">Cancel</a>
        </div>
        <input type="hidden" class="font-weight-bold form-control border-0" id="name" name="name" value="{{ $user['name'] }}">
        <input type="hidden" class="font-weight-bold form-control border-0" id="email" name="email" value="{{ $user['email'] }}">
        <input type="hidden" id="profile" name="profile" value="{{ $user['profile'] }}">
        <input type="hidden" class="font-weight-bold form-control border-0" id="type" name="type" value="{{ $user['type'] }}">
        <input type="hidden" class="font-weight-bold form-control border-0" id="phone" name="phone" value="{{ $user['phone'] }}">
        <input type="hidden" id="date" name="date" data-date-format="mm/dd/yyyy" class="font-weight-bold form-control border-0" value="{{ $user['date'] }}">
        <input type="hidden" id="address" name="address" class="font-weight-bold form-control border-0" value="{{ $user['address'] }}">
        </form>
    </div>
    
  </div>
</div>
@endsection