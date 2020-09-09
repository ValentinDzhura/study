@extends('layouts.app')

@section('title', 'Edit' .$article -> title)


@section('content')
<form method = "POST" action = "{{route('articles.update', $article)}}">
@csrf
@method ('PATCH')
  <div class="form-group">
    <label for="title">Title</label>
    <input name ="title" type="text" value=" {{ $article -> title }}" class="form-control" id="title" placeholder="Title">
  </div>
    <div class="form-group">
    <label for="post-description">Description</label>
    <textarea  name = "description"  class="form-control" id="post-description" rows="5">{{ $article ->description }}</textarea>
  </div>
  <button type = "submit" class = "btn btn-success">EDIT</button>
</form>
@endsection