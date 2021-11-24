@extends('layouts.app')
@section('content')
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h2 class="text-primary my-5">Change Password</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form action="{{route('user.change')}}" method="POST">
          @csrf
          <div class="form-group row">
             <label for="current-password" class="col-sm-4 col-form-label text-primary">Current Password :</label>
             <div class="col-sm-5">
               <input type="password"  class="form-control @error ('current-password') is-invalid @enderror" id="current-password" name="current-password">
               @error('current-password')
                <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                @enderror 
             </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label text-primary">New Password :</label>
            <div class="col-sm-5">
              <input type="password"  class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password">
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
         </div>
         <div class="form-group row">
          <label for="password-confirmation" class="col-sm-4 col-form-label text-primary">Confirm New Password :</label>
          <div class="col-sm-5">
            <input type="password" onpaste="return false" class="form-control @error('password-confirmation') is-invalid @enderror" id="password-confirmation" name="password-confirmation" autocomplete="current-password">
            @error('password-confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
          </div>
         </div>
         <button class="btn btn-primary my-3" type="submit">Change</button>
         <button class="btn btn-outline-primary mx-3 px-3" type="reset">Clear</button>
        </form>
      </div>
    </div>
    </div>
    @if(Session('message'))
    <div class="alert alert-dismissible alert-danger show fade">
      {{ Session('message') }}  
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif
  </div>
@endsection