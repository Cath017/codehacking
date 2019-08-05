@extends('layouts.front')

@section('content')
@include('includes.ckeditor')
<h1>Edit Post</h1>
<div class="row">
  <div class="col-sm-3">
    <img src="{{$post->photo ? $post->photo->file : '/images/placeholder1.jpg'}}" alt="" class="img-responsive img-rounded">
  </div>
  <div class="col-sm-9">
    {!! Form::model($post,['method'=>'PATCH','action'=>['PostsController@update', $post->id], 'files'=>true])!!}
    <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('category_id', 'Category:') !!}
      {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('photo_id') !!}
    </div>
    <div class="form-group">
      {!! Form::label('body', 'Description:') !!}
      {!! Form::textarea('body', null, ['class'=>'form-control','id'=>'editor']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Update Post', ['class'=>'btn btn-info col-sm-6']) !!}
    </div>
    {!! Form::close() !!}
  </div>
</div>
@stop