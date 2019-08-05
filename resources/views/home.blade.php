@extends('layouts.front')
@section('content')
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        
        <!-- Blog Post -->
        @if($posts)
        @foreach($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-md-4">
                    <h2><a class="text-warning" href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h2>
                    <p class="lead">by {{$post->user->name}}</p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->toCookieString()}}</p>
                    <hr>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive pull-right" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt="">
                </div>
                <div class="col-md-4">
                    <p>{!!str_limit($post->body,500)!!}</p>
                    <a class="btn btn-default" href="{{route('post.show', $post->slug)}}">Read More...</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
            </div>
        </div>
    </div>

    <!-- Blog Sidebar -->
    

<!-- /.row -->
<hr>
@stop
