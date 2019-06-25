@extends('layouts.admin')

@section('content')
@include('includes.ckeditor')
<h1>Create Post</h1>
{!! Form::open(['method'=>'POST','action'=>'PostsController@store', 'files'=>true])!!}
<div class="form-group">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('category_id', 'Category:') !!}
  {!! Form::select('category_id',[''=>'Choose Options'] + $categories, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  <label class="btn btn-primary">
   Browse... {!! Form::file('photo_id',['style'=>'display:none']) !!}
  </label>
</div>
<div class="form-group">
  {!! Form::label('body', 'Description:') !!}
  {!! Form::textarea('body', null, ['class'=>'form-control','id'=>'editor']) !!}
</div>
<script>
  CKEDITOR.replace('editor', options);
  </script>
<div class="form-group">
  {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

@include('includes.form_error')
@stop