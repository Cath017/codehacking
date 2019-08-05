<div class="media">
  <a href="#" class="pull-left">
      <img src="{{$comment->user->photo ? $comment->user->photo->file : '/images/avatar.png'}}" weight="64" height="64" class="media-object">
  </a>
  <div class="media-body">
      <h4 class="media-heading">{{$comment->user->name}}</h4>
      <small>{{$comment->created_at->diffForHumans()}}</small>
      <p>{{$comment->body}}</p>

      @include('comments.form', ['parentId' => $comment->id])

      @if(isset($comments[$comment->id]))
        @include('comments.list', ['collection' => $comments[$comment->id]])
      @endif

  </div>
</div>