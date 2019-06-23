@extends('layouts.admin')

@section('content')
@if($comments)
<h1>Comments</h1>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Post</th>
      <th>Body</th>
      <th>Created</th>
    </tr>
  </thead>
  <tbody>
      @foreach($comments as $comment)
    <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->user['name']}}</td>
    <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post['title']}}</a></td>
      <td>{{str_limit($comment->body, 20)}}</td>
      <td>{{$comment->created_at->diffForHumans()}}</td>
      <td>
        @if($comment->is_active == 0)
        {!! Form::open(['method'=>'PATCH','action'=>['CommentsController@update',$comment->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_active" value="1">
            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
          </div>
        {!! Form::close() !!}
        @else
        {!! Form::open(['method'=>'PATCH','action'=>['CommentsController@update',$comment->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_active" value="0">
            {!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
          </div>
        {!! Form::close() !!}
        @endif
      </td>
      <td>
        {!! Form::open(['method'=>'DELETE','action'=>['CommentsController@destroy',$comment->id,]]) !!}
        <div class="form-group">
          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
      </td>
      <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
      
      @else
      <h1 class="text-center">No Comments</h1>
@endif

@if(Session::has('message'))
  <script>toastr.success("{{ Session::get('message') }}");</script>
@endif
@stop