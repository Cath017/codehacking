@extends('layouts.admin')

@section('content')
@if(count($replies) > 0)
<h1>Replies</h1>
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
      @foreach($replies as $reply)
    <tr>
      <td>{{$reply->id}}</td>
      <td>{{$reply->user['name']}}</td>
      <td><a href="{{route('home.post', $reply->comment->post['id'])}}">{{$reply->comment->post['title']}}</a></td>
      <td>{{str_limit($reply->body, 20)}}</td>
      <td>{{$reply->created_at->diffForHumans()}}</td>
      <td>
        @if($reply->is_active == 0)
        {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_active" value="1">
            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
          </div>
        {!! Form::close() !!}
        @else
        {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id,]]) !!}
          <div class="form-group">
            <input type="hidden" name="is_active" value="0">
            {!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
          </div>
        {!! Form::close() !!}
        @endif
      </td>
      <td>
        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id,]]) !!}
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

@if(Session::has('message'))
  <script>toastr.success("{{ Session::get('message') }}");</script>
@endif
@stop