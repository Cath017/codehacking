@extends('layouts.front')
@section('content')
<div class="row">
<!-- Blog Post -->
    <div class="col-md-8">
        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">by {{$post->user->name}}</p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->toCookieString()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg'}}" alt="">

        <hr>

        <!-- Post Content -->
        <p>{!! $post->body !!}</p>

        <hr>
        @if(auth()->user()->id === $post->user_id || auth()->user()->isAdmin())
        <a class="btn btn-primary pull-left" href="{{route('post.edit', $post->id)}}">Edit Post</a>
        {!! Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id,]]) !!}
        <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger pull-right']) !!}
        </div>
        {!! Form::close() !!}
        <div class="clearfix"></div>
        @endif
        <br>
        {{-- Comments section --}}
        @if(Auth::check())
        <div class="well">
            <h4>Leave a comment:</h4>
            @include('comments.form')
        </div>
        @endif
        {{-- Displaying comments --}}
        
            @include('comments.list', ['collection' => $comments['root']])
       
        <hr>

        

        {{-- <!-- DISQUS COMMENTS -->
        <div id="disqus_thread"></div>
        <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://codehacking-0gsvtn2pf6.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <script id="dsq-count-scr" src="//codehacking-0gsvtn2pf6.disqus.com/count.js" async></script>                 --}}
    </div>

    <!-- Blog Sidebar -->
    
@stop