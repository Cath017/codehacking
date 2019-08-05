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
        <h4 class="text-center">Blog Categories</h4>
        <div class="row text-center">
            <div class="col-lg-12">
                @if($categories)
                @foreach($categories as $category)
                    <ul class="list-unstyled">
                        <li><a href="#">{{$category->name}}</a></li>  
                    </ul>
                @endforeach
                @endif
            </div>           
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
</div>
</div>