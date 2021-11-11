@extends('layouts.app')
@section('content')
  <div class="container my-4 pb-5">
    <div class="row mb-2">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h2 class="text-primary my-3">Create User </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="{{url('users/confirm')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
             <label for="name" class="col-sm-3 col-form-label text-primary">Name :</label>
             <div class="col-sm-9">
               <input type="text"  class="form-control @error ('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
               @error('name')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
             @enderror
             </div>
          </div>
         <div class="form-group row"> 
            <label for="email" class="col-sm-3 col-form-label text-primary">Email Address :</label>
            <div class="col-sm-9">
            <input type="email"  class="form-control @error ('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}">
            @error('email')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label text-primary">Password :</label>
            <div class="col-sm-9">
              <input type="password"  class="form-control @error ('password') is-invalid @enderror" id="password" name="password" value="{{ old('password')}}">
              @error('password')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror 
            </div>
          </div>
          <div class="form-group row">
            <label for="cpassword" class="col-sm-3 col-form-label text-primary">Confirm Password :</label>
            <div class="col-sm-9">
              <input type="password"  class="form-control @error ('cpassword') is-invalid @enderror" id="cpassowrd" name="cpassword" value="{{ old('cpassword')}}">
              @error('cpassword')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror 
            </div>
          </div>
          <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label text-primary">Type :</label>
            <div class="col-sm-9">
              <select class="custom-select" id="type" name="type">
                <option value="1">User</option>
                <option value="0">Admin</option>
              </select>
            </div>
         </div>
         <div class="form-group row">
          <label for="phone" class="col-sm-3 col-form-label text-primary">Phone Number :</label>
          <div class="col-sm-9">
          <input type="text"  class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone')}}">
              @error('phone')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror 
          </div>
        </div>
         <div class="form-group row">
          <label for="date" class="col-sm-3 col-form-label text-primary">Date of Birth :</label>
          <div class="col-sm-9">
            <input type="date" id="date" name="date" data-date-format="YYYY/mm/dd" class="form-control @error ('date') is-invalid @enderror" value="{{ old('date')}}">
            @error('date')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror 
          </div>
       </div>
       <div class="form-group row">
          <label for="address" class="col-sm-3 col-form-label text-primary">Address :</label>
          <div class="col-sm-9">
            <textarea class="form-control @error ('address') is-invalid @enderror" name="address" id="address"  rows="3">{{ old('address')}}</textarea>
            @error('address')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror 
          </div>
       </div>
       <div class="form-group row">
        <label for="profile" class="col-sm-3 col-form-label text-primary">Profile :</label>
        <div class="col-sm-9">
          <input type="file" class="text-center file-upload @error ('profile') is-invalid @enderror" id="profile" name="profile" value="{{ old('profile')}}"> 
          @error('profile')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror 
          <br><br>
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png" width="120px" height="120px" class="avatar img-circle img-thumbnail rounded-circle"  alt="avatar">
        </div>
       </div>
         <button class="btn btn-primary my-3" type="submit">Confirm</button>
         <button class="btn btn-outline-primary mx-3 px-3" type="reset">Clear</button>
        </form>
      </div>
    </div>
  </div>
@endsection