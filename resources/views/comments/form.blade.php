{!! Form::open(['method'=>'POST','action'=>'CommentsController@store'])!!}
  <input type="hidden" name="post_id" value="{{$post->id}}">

  @if(isset($parentId))
    <input type="hidden" name="parent_id" value="{{$parentId}}">
  @endif
  <div class="form-group">
      {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
  </div>
  <div class="form-group">
      {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
  </div>
{!! Form::close() !!}