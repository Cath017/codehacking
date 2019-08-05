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
      <td><a href="{{route('post.show', $comment->post->slug)}}">{{$comment->post['title']}}</a></td>
      <td>{{str_limit($comment->body, 20)}}</td>
      <td>{{$comment->created_at->diffForHumans()}}</td>
      <td>
        @if($comment->is_approved == 0)
        {!! Form::open(['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_approved" value="1">
            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
          </div>
        {!! Form::close() !!}
        @else
        {!! Form::open(['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_approved" value="0">
            {!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
          </div>
        {!! Form::close() !!}
        @endif
      </td>
      <td>
        {!! Form::open(['method'=>'DELETE','action'=>['AdminCommentsController@destroy',$comment->id,]]) !!}
        <div class="form-group">
          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
  <h1 class="text-center">No Comments</h1>
@endif
<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
    {{$comments->render()}}
  </div>
</div>

@stop