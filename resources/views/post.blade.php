@extends('layouts.blog-post')

@section('content')
  <!-- Blog Post -->
    
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                  by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->toCookieString()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                {!! Form::open(['method'=>'POST','action'=>'CommentsController@store'])!!}  
                <input type="hidden" name="post_id" value="{{$post->id}}">        
                <div class="form-group">
                  {!! Form::textarea('body',null,['class'=>'form-control', 'placeholder'=>'Leave a comment...']) !!}
                </div>
                <div class="form-group">
                  {!! Form::submit('Send Comment', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @if(count($comments) > 0)
                    @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64" src="{{$comment->user->photo['file']}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                        <small>{{$comment->user->email}}</small>
                        </h4>
                        <small>{{$comment->created_at->toCookieString()}}</small>
                        <p>{{$comment->body}}</p>
                        <!-- Nested Comment -->
                        <div class="media">
                            @if(count($comment->replies) > 0)
                                @foreach($comment->replies as $reply)
                                    @if($reply->is_active == 1)
                                    
                                    <a class="pull-left" href="#">
                                        <img height="64" src="{{$reply->comment->user->photo['file']}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->comment->user->name}}
                                            <small>{{$reply->comment->user->email}}</small>
                                        </h4>
                                        <small>{{$reply->created_at->toCookieString()}}</small>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@store'])!!}  
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">        
                            <div class="form-group">
                            {!! Form::textarea('body',null,['class'=>'form-control', 'placeholder'=>'Leave a reply...','rows'=>1]) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::submit('Send Reply', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

        

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
              </div>

            
@stop