@extends('layouts.admin')


@section('content')
  <h1>Categories</h1>
  <div class="col-sm-6">
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
    <div class="form-group">
      {!! Form::label('name', 'Name of category:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
  </div>
  <div class="row">
  <div class="col-sm-6">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <td>Name</td>
          <td>Created</td>
        </tr>
      </thead>
      <tbody>
        @if($categories)
          @foreach($categories as $category)
        <tr>
          <td>{{$category->id}}</td>  
          <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
          <td>{{$category->created_at->diffForHumans()}}</td>
          <td>
            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id,]]) !!}
            <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
          </td>
        </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
  </div>
  
@stop