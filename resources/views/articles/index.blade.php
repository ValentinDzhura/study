@extends('layouts.app')

@section('title', 'Index')


@section('content')
@if(session()->get('success'))
    <div class = "alert alert-success">
    {{session()->get('success')}}
    </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach($article as $article)
    <tr>
      <th scope="row">{{$article->id}}</th>
      <td>{{$article->title}}</td>
      <td>{{$article->description}}</td>
      <td>
        <a href ="{{route ('articles.show', $article)}}" class ="btn btn-show">SHOW</a>
        <a href ="{{route ('articles.edit' , $article )}}" class ="btn btn-update">EDIT</a>
        
        <form method = "POST" action="{{route ('articles.destroy', $article )}}">
        @csrf
          @method('DELETE')
        <button tupe = "submit" class ="btn btn-delete">DELETE</button>
        </form>
    </tr>
    @endforeach
   </tbody>
</table>
@endsection