@extends('layouts.app')
@section('content')
<div class="container m-auto">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
      <h2 class="text-primary my-5 font-weight-bold">Create Post Confirmation</h2>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-light p-5">
      <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label text-primary">Title :</label>
          <div class="col-sm-9">
            <input type="text" id="title" name="title" value="{{ $post['title'] }}" class="form-control font-weight-bold bg-white" readonly><br><br>
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-3 col-form-label text-primary">Description :</label>
          <div class="col-sm-9">
            <input type="text" id="description" name="description" value="{{ $post['description'] }}" class="form-control font-weight-bold bg-white" readonly><br><br>
          </div>
        </div>
        <input type="checkbox" class="form-control" id="status" name="status" value="1" checked hidden>
        <div class="float-right">
          <a href="{{ route('post.create') }}" type="button" class="btn btn-outline-primary mx-3">Cancel</a>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection