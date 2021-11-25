@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 my-5 mx-auto">
      <!-- general form elements -->
      <div class="card card-primary rounded shadow bg-white">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">Update Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('posts/update_confirm') }}" method="POST">
          @csrf
          <input type="text" id="id" name="id" value="{{ $post->id }}" hidden>
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" placeholder="Post Title Here" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title ?? old('title') }}">
              @error('title')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $post->description ?? old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback"><strong>{{$message}}</strong></div>
              @enderror
            </div>
            <div class="form-gruop">
              <label for="status">Status</label>
              <input type="checkbox" class="align-left d-flex" data-toggle="toggle" class="form-control" id="status" name="status" checked>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Confirm</button>
            <a type="submit" class="btn btn-danger" onclick="document.getElementById('title').value = '',document.getElementById('description').value = ''">Clear</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
</div>
@endsection