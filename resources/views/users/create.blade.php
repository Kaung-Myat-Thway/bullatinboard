@extends('layouts.app')
@section('content')
<div class="container ">
  <div class="row">
  <div class="col-md-10 mt-5 mx-auto ">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title text-center">Create User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('users/confirm')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" placeholder="Your name..."  class="form-control @error ('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" placeholder="Your email..." class="form-control @error ('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}">
            @error('email')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" placeholder="password.." class="form-control @error ('password') is-invalid @enderror" id="password" name="password" value="{{ old('password')}}">
            @error('password')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="cpassword">Confirm Password</label>
              <input type="password" onpaste="return false" class="form-control @error ('cpassword') is-invalid @enderror" id="cpassowrd" name="cpassword" value="{{ old('cpassword')}}">
            @error('cpassword')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <select class="custom-select" id="type" name="type">
              <option value="1">User</option>
              <option value="0">Admin</option>
            </select>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" placeholder="Your Phone..." class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone')}}">
            @error('phone')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="date">Date of Birth</label>
              <input type="date" id="date" name="date" data-date-format="YYYY/mm/dd" class="form-control @error ('date') is-invalid @enderror" value="{{ old('date')}}">
            @error('date')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea placeholder="Your address..." class="form-control @error ('address') is-invalid @enderror" name="address" id="address" rows="3">{{ old('address')}}</textarea>
            @error('address')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="profile">Profile</label>
              <input type="file" class="text-center file-upload @error ('profile') is-invalid @enderror" id="profile" name="profile" value="{{ old('profile')}}">
            @error('profile')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            <br><br>
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png" width="120px" height="120px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="reset" class="btn btn-danger">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card -->




    </div>
  
  </div>
</div>
@endsection