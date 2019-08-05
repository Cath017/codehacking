@foreach($collection as $comment)
@if($comment->is_approved == 1)
  @include('comments.comment')
  @endif
@endforeach