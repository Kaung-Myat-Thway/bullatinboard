@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">

    <div class="col-md-8 my-5 mx-auto">
      <!-- general form elements -->
      <div class="card card-primary shadow bg-white rounded">
        <div class="card-header bg-gradient-primary">
        <h3 class="card-title text-center">Change Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.change')}}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
            <label for="current-password">Current Password</label>
         
            <input type="password"  class="form-control @error ('current-password') is-invalid @enderror" id="current-password" name="current-password">
      
   
            
               @error('current-password')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                @enderror 
            </div>
            <div class="form-group ">
            <label for="password" >New Password</label>
            <div class="input-group" id="show_hide_password">
            <input type="password"  class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password">
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>
          
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            
         </div>
         <div class="form-group ">
          <label for="password-confirmation" >Confirm New Password </label>
            <input type="password" onpaste="return false" class="form-control @error('password-confirmation') is-invalid @enderror" id="password-confirmation" name="password-confirmation" autocomplete="current-password">
            @error('password-confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
          
         </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
          <button class="btn btn-primary " type="submit">Change</button>
         <button class="btn btn-danger " type="reset">Clear</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>

    </div>
    </div>
    @if(Session('message'))
    <div class="alert alert-dismissible alert-danger show fade">
      {{ Session('message') }}  
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
 >
@endsection