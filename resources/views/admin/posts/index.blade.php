@extends('layouts.admin')

@section('content')
<h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Picture</th>
      <td>Title</td>
      <th>Body</th>
      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
    @if($posts)
      @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->user['name']}}</td>
      <td><img height="100" src="{{$post->photo ? $post->photo->file : '/images/placeholder1.jpg'}}" alt=""></td>
      <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
      <td>{{$post->body}}</td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
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
@stop