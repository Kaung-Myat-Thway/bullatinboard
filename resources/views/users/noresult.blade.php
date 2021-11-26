@extends('layouts.app')
@section('content')
<div class="container mb-5 pb-5">
  <div class="row">
    <div class="col-12 py-3">
      <h2 class="text-dark font-weight-bold">User List</h2>
    </div>
  </div>
  <div class="row mb-3">
    <form action="{{route('user.search')}}" method="GET" class="col-lg-10 col-md-12 col-sm-12 row">
      <div class="col-2 "> <input type="text" name="name" id="name" class="form-control font-weight-normal" placeholder="Name" value="{{request('name')}}" /></div>
      <div class="col-2 "> <input type="text" name="email" id="email" class="form-control font-weight-normal" placeholder="Email" value="{{request('email')}}" /></div>
      <div class="col-3 "> <input type="date" data-date-format="yyyy/mm/dd" name="created_from" value="{{request('created_from')}}" class="form-control" placeholder="Created From" value="{{ old('created_from')}}" /></div>
      <div class="col-3 "> <input type="date" data-date-format="yyyy/mm/dd" name="created_to" class="form-control" placeholder="Created To" value="{{request('created_to')}}" /></div>
      <button type="submit" class="btn btn-outline-primary px-2 col-2"><i class="fas fa-search"></i> Search</button>
    </form>
    <div class="col-lg-2 col-md-2 col-sm-2">
      <a href="{{ route('user.create') }}" class="btn btn-outline-primary px-5 w-100"><i class="fas fa-plus-circle"></i>Add</a>
    </div>
  </div>
  @if(Session('message'))
    <div class="alert alert-dismissible alert-success show fade">
      {{ Session('message') }}  
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
 


</div>
{{ $users->appends(Request::get('page'))->links() }}
</div>
@endsection