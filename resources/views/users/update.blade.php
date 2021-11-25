@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-10 mt-5 mx-auto ">
      <!-- general form elements -->
      <div class="card card-primary rounded shadow bg-white">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title text-center">Update User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.update_confirm') }}" method="POST" enctype="multipart/form-data" id="user">
        @csrf
          <div class="card-body">
          <input type="hidden" id="id" name="id" value="{{ $user['id'] }}">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control font-weight-bold @error ('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
            @error('name')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control font-weight-bold @error ('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" onreset="this.value=''">
            @error('email')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <select class="custom-select font-weight-bold" id="type" name="type">
              <option value="User" selected>User</option>
              <option value="Admin">Admin</option>
            </select>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control font-weight-bold @error ('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}">
            @error('phone')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="date">Date of Birth</label>
              <input type="date" id="date" name="date" data-date-format="mm/dd/yyyy" class="form-control font-weight-bold @error ('date') is-invalid @enderror" value="{{ $user->dob }}">
            @error('date')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control font-weight-bold @error ('address') is-invalid @enderror" name="address" id="address" rows="3">{{ $user->address }}</textarea>
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
            @if(!(is_null($user['profile'])))
            <img src="/img/{{ $user['profile'] }}" id="profile" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
            @else
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
            @endif
            @error('profile')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
        
            </div>
            <div class="form-group">
            <a href="{{ route('user.password')}}" class="ml-2 mt-3">Change Password</a>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-success">Confirm</button>
            <a class="btn btn-danger" type="submit" onclick="document.getElementById('name').value = '',document.getElementById('phone').value = '',document.getElementById('email').value = '',document.getElementById('date').value = '',document.getElementById('address').value = ''">Clear</a>
          </div>
        </form>
      </div>
      <!-- /.card -->




    </div>
  
  </div>
  </div>
</div>
</script>
@endsection