@extends('layouts.admin')

@section('content')
<h1>Users</h1>
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <td>Photo</td>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($users)
        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/avatar.png'}}" alt=""></td>
        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role['name']}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$users->render()}}
    </div>
  </div>
@stop

