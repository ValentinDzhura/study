@extends('layouts.app')

@section('title')


@section('content')
<div class="card">
  <div class="card-body">
  <h3> {{ $article ->title}}</h3>
   <p>{{ $article -> description }}</p>
  </div>
  </div>
  <div class ="comment">
    @foreach($article ->comments as $comment)
    <article>
      {{$comment -> comment}}
      <a href ="/comment/{{$comment->id}}/edit" class ="btn btn-update">EDIT</a>
      <form method = "POST" action="/comment/{{$comment->id}}">
        @csrf
          @method('DELETE')
        <button tupe = "submit" class ="btn btn-delete">DELETE</button>
        </form>
    </article>
    @endforeach
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method = "POST" action = "/articles/{{$article->id}}">
  @csrf
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea  name="comment" class="form-control" id="comment" rows="1"></textarea>
  </div>
  <button type = "submit" class = "btn btn-success">ADD COMMENT</button>
  </form>
  </div>
@endsection