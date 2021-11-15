@extends('layouts.app')
@section('content')
<div class="container mb-5">
  <div class="row my-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h2 class="text-primary">Update Post Confirmation</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-light p-5">
      <form action="{{ route('post.update', $post['id']) }}" method="POST">
        @method('PATCH')
        @csrf
        <input type="text" id="id" name="id" value="{{ $post['id'] }}" hidden>
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label text-primary">Title :</label>
          <div class="col-sm-9">
            <input type="text" id="title" name="title" value="{{ $post['title'] }}" class="font-weight-bold form-control border-0 bg-white" readonly> <br>
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-3 col-form-label text-primary">Description :</label>
          <div class="col-sm-9">
            <input type="text" id="description" name="description" value="{{ $post['description'] }}" class="font-weight-bold form-control border-0  bg-white" readonly><br>
          </div>
        </div>
        <div class="form-group row mb-5">
          <label for="status" class="col-sm-3 col-form-label text-primary">Status :</label>
          <div class="col-sm-9">
            <input type="text" class="form-control font-weight-bold  bg-white" data-toggle="toggle" id="status" name="status" value="{{ $post['status'] }}" checked readonly>
          </div>
        </div>
        <div class="float-right">
          <a href="{{ route('post.edit',$post['id']) }}" class="btn btn-outline-primary mx-3 px-3">Cancel</a>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection