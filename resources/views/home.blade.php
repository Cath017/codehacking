@extends('layouts.app')

@section('content')
         <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               
                <!-- Blog Post -->
                @if($posts)
                @foreach($posts as $post)
                <h2>
                    <a href="{{route('home.post', $post->slug)}}">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->toCookieString()}}</p>
                <hr>
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/placeholder1.jpg'}}" alt="">
                <hr>
                <p>{{str_limit($post->body,500)}}</p>
                <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                @endforeach
                @endif
                <hr>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                    {{$posts->render()}}
                    </div>
                </div>
            </div>

            <!-- Blog Sidebar -->
            @include('includes.front_sidebar')

        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
        @include('includes.footer')

    </div>
   
@endsection
