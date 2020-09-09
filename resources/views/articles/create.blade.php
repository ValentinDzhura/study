@extends('layouts.app')

@section('title', 'Create')


@section('content')
<form method = "POST" action = "{{route('articles.store')}}">
@csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name ="title" type="text" class="form-control" id="title" placeholder="Title">
  </div>
    <div class="form-group">
    <label for="post-description">Description</label>
    <textarea  name="description" class="form-control" id="post-description" rows="5"></textarea>
  </div>
  <button type = "submit" class = "btn btn-success">CREATE</button>
</form>
@endsection