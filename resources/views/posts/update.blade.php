@extends('layouts.app')
@section('content')
<div class="container my-5">
  <div class="row my-3">
    <div class="col-md-2"></div>
    <div class="col-md-10">
      <h2 class="text-primary font-weight-bold">Update Post</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 bg-light p-5">
      <form action="{{ url('posts/update_confirm') }}" method="POST">
        @csrf
        <input type="text" id="id" name="id" value="{{ $post->id }}" hidden>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label text-primary">Title :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title }}">
            @error('title')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
          <span class="asterisk_input"> </span>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label text-primary">Description :</label>
          <div class="col-sm-10">
            <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $post->description }}</textarea>
            @error('description')
            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
            @enderror
          </div>
          <span class="asterisk_input"> </span>
        </div>
        <div class="form-group row mb-5">
          <label for="status" class="col-sm-2 col-form-label text-primary">Status :</label>
          <div class="col-sm-1">
            <input type="checkbox" data-toggle="toggle" class="form-control" id="status" name="status" vlaue="1" checked>
          </div>
        </div>
        <div class="float-right">
          <a type="submit" class="btn btn-outline-primary mx-3 px-3" onclick="document.getElementById('title').value = '',document.getElementById('description').value = ''">Clear</a>
          <button class="btn btn-primary" type="submit">Confirm</button>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection