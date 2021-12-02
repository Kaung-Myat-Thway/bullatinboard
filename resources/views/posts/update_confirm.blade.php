@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 my-5 mx-auto">
      <!-- general form elements -->
      <div class="card card-primary rounded shadow bg-white">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">Update Confirm Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('post.update', $post['id']) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="card-body">
            <input type="text" id="id" name="id" value="{{ $post['id'] }}" hidden>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" value="{{ $post['title'] }}" class="form-control  bg-white" readonly>
              @error('title')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="{{ $post['description'] }}" class="form-control  bg-white" readonly>
              @error('description')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-gruop">
              <input type="checkbox" class="form-control" id="status" name="status" value="1" checked hidden>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <!-- <a href="{{ route('post.edit',$post['id']) }}" class="btn btn-danger">Cancel</a> -->
            <a href="javascript:history.back()" type="button" class="btn btn-danger">Back</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection