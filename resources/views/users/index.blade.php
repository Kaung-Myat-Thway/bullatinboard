@extends('layouts.app')
@section('content')
<div class="container mb-5 pb-5">
  <div class="row">
    <div class="col-md-12 py-3">
      <h2 class="text-dark font-weight-bold">User List</h2>
    </div>
  </div>
  <div class="row mb-3">
    <form action="{{route('user.search')}}" method="GET" class="col-md-10 row">
      <div class="col-md-2 "> <input type="text" name="name" id="name" class="form-control font-weight-normal" placeholder="Name" value="{{request('name')}}" /></div>
      <div class="col-md-2 "> <input type="text" name="email" id="email" class="form-control font-weight-normal" placeholder="Email" value="{{request('email')}}" /></div>
      <div class="col-md-3 "> <input type="date" data-date-format="yyyy/mm/dd" name="created_from" value="{{request('created_from')}}" class="form-control" placeholder="Created From" value="{{ old('created_from')}}" /></div>
      <div class="col-md-3 "> <input type="date" data-date-format="yyyy/mm/dd" name="created_to" class="form-control" placeholder="Created To" value="{{request('created_to')}}" /></div>
      <button type="submit" class="btn btn-outline-primary px-2 col-md-2"><i class="fas fa-search"></i> Search</button>
    </form>
    <div class="col-md-2">
      <a href="{{ route('user.create') }}" class="btn btn-outline-primary px-5 w-100"><i class="fas fa-plus-circle"></i>Add</a>
    </div>
  </div>
  @if(Session('message'))
    <div class="alert alert-dismissible alert-success show fade">
      {{ Session('message') }}  
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
  <div class="row">
    <div class="col-md-12 mt-3">
      <table class="table table-hover mt-3 text-primary">
        <thead class="bg-gradient-dark text-light">
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created User</th>
            <th>Phone</th>
            <th>Birth Date</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
      @php
        $i=1;
      @endphp
          @foreach($users as $user)
          <tr>
            <td class="text-dark">{{$i++}}</td>
            <td><a href="" class="modal-lg text-dark" data-toggle="modal" data-target="#user{{ $user->id }}" type="button">
                {{ $user->name }}</a>
              <!-- Modal -->
              <div class="modal fade" id="user{{ $user->id }}" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="name">{{ $user->name }}</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="get" class="mb-5 ml-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mt-3">
                          <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                          <div class="col-sm-4">
                            <img src="/img/{{ $user->profile }}" width="150px" height="150px" class="avatar img-circle img-thumbnail rounded-circle" alt="avatar">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-sm-4 col-form-label text-primary">Name :</label>
                          <div class="col-sm-7">
                            <input type="text" class="text-primary font-weight-bold form-control border-0" id="name" name="name" value="{{ $user->name }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label text-primary">Email Address :</label>
                          <div class="col-sm-7">
                            <input type="email" class="text-primary font-weight-bold form-control border-0" id="email" name="email" value="{{ $user->email }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="type" class="col-sm-4 col-form-label text-primary">Type :</label>
                          <div class="col-sm-7">
                            @if($user['type'] == 0 )
                            <input type="text" class="text-primary font-weight-bold form-control border-0" id="type" name="type" value="Admin" disabled>
                            @else
                            <input type="text" class="text-primary font-weight-bold form-control border-0" id="type" name="type" value="User" disabled>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="phone" class="col-sm-4 col-form-label text-primary">Phone Number :</label>
                          <div class="col-sm-7">
                            <input type="text" class="text-primary font-weight-bold form-control border-0" id="phone" name="phone" value="{{ $user->phone }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="date" class="col-sm-4 col-form-label text-primary">Date of Birth :</label>
                          <div class="col-sm-7">
                            <input type="text" id="date" name="date" data-date-format="mm/dd/yyyy" class="text-primary font-weight-bold form-control border-0" value="{{ $user->dob }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="address" class="col-sm-4 col-form-label text-primary">Address :</label>
                          <div class="col-sm-7">
                            <input type="text" id="address" name="address" class="text-primary font-weight-bold form-control border-0" value="{{ $user->address }}" disabled>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td class="text-dark">{{ $user->email }}</td>
            <td class="text-dark">{{$user->created_user['name']}}</td>
            <td class="text-dark">{{ $user->phone }}</td>
            <td class="text-dark">{{ $user->dob }}</td>
            <td class="text-dark">{{ $user->created_at->format('m/d/Y') }}</td>
            <td>
              <a href="#" class="btn btn-danger delete btn-sm" data-toggle="modal" data-target="#deleteModal{{ $user->id }}"><i class="fas fa-trash"></i> Delete</a>
              <!-- Delete Modal -->
              <div class="modal modal-danger fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-light">
                      <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel">Delete User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-center text-primary">Are you sure you want to delete this user?</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
    </div>
    <!-- End Delete Modal -->
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>


</div>
{{ $users->appends(Request::get('page'))->links() }}
</div>
@endsection