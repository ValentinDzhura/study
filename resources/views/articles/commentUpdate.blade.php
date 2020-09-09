@extends('layouts.app')

@section('title', 'Edit' )


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method = "POST" action = "/update/{{$comment->id}}">
  @csrf
  @method ('PATCH')
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea  name="comment" class="form-control" id="comment" rows="1">{{ $comment ->comment }}</textarea>
  </div>
  <button type = "submit" class = "btn btn-success">Edit</button>
  </form>
  </div>
@endsection