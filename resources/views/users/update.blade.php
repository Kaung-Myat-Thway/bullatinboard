@extends('layouts.app')
@section('content')
<div class="container py-3 mb-5">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h2 class="text-primary my-3">Update User </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 mt-5">
      <form action="{{ route('user.update_confirm') }}" method="POST" enctype="multipart/form-data" id="user">
        @csrf
        <div class="form-group row">
          <input type="hidden" id="id" name="id" value="{{ $user['id'] }}">
          <label for="name" class="col-sm-4 col-form-label text-primary">Name :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control font-weight-bold @error ('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
            @error('name')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label text-primary">Email Address :</label>
          <div class="col-sm-8">
            <input type="email" class="form-control font-weight-bold @error ('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" onreset="this.value=''">
            @error('email')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="type" class="col-sm-4 col-form-label text-primary">Type :</label>
          <div class="col-sm-8">
            <select class="custom-select font-weight-bold" id="type" name="type">
              <option value="User" selected>User</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label text-primary">Phone Number :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control font-weight-bold @error ('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}">
            @error('phone')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label text-primary">Date of Birth :</label>
          <div class="col-sm-8">
            <input type="date" id="date" name="date" data-date-format="mm/dd/yyyy" class="form-control font-weight-bold @error ('date') is-invalid @enderror" value="{{ $user->dob }}">
            @error('date')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label text-primary">Address :</label>
          <div class="col-sm-8">
            <textarea class="form-control font-weight-bold @error ('address') is-invalid @enderror" name="address" id="address" rows="3">{{ $user->address }}</textarea>
            @error('address')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="profile" class="col-sm-4 col-form-label text-primary">Profile :</label>
          <div class="col-sm-8">
            <input type="file" class="text-center file-upload @error ('profile') is-invalid @enderror" id="profile" name="profile" value="{{ old('profile')}}">
            @error('profile')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
            <br><br>
            @if(!(is_null($user['profile'])))
            <img src="/img/{{ $user['profile'] }}" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
            @else
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
            @endif
          </div>
          <a href="{{ route('user.password')}}" class="ml-2 mt-3">Change Password</a>
        </div>
        <button class="btn btn-primary my-3" type="submit">Confirm</button>
        <a class="btn btn-outline-primary mx-3 px-3" type="submit" onclick="document.getElementById('name').value = '',document.getElementById('phone').value = '',document.getElementById('email').value = '',document.getElementById('date').value = '',document.getElementById('address').value = ''">Clear</a>
      </form>
    </div>
  </div>
</div>
</script>
@endsection