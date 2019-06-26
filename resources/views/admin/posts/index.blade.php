@extends('layouts.admin')

@section('content')
<h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Picture</th>
      <td>Title</td>
      <th>Author</th>
      <th>Category</th>
      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
    @if($posts)
      @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img height="70" src="{{$post->photo ? $post->photo->file : '/images/placeholder1.jpg'}}" alt=""></td>
      <td><a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a></td>
      <td>{{$post->user['name']}}</td>
      <td>{{$post->category ? $post->category['name'] : 'Uncategorized'}}</td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
      <td><a class="btn btn-success" href="{{route('posts.edit', $post->id)}}">Update Post</a></td>
      <td><a class="btn btn-info" href="{{route('comments.show', $post->id)}}">View Comments</a></td>
    </tr>
      @endforeach
    @endif
  </tbody>
</table>
@if(Session::has('message'))
<script>var type = "{{ Session::get('type', 'info') }}";
  switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }</script>
{{-- <p class="bg-danger">{{session('deleted_user')}}</p> --}}
@endif
<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
    {{$posts->render()}}
  </div>
</div>
@stop