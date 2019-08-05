{{------- TOP NAVIGATION -------}}
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Home</a>
  </div>
  <!-- /.navbar-header -->



  <ul class="nav navbar-top-links navbar-right">


      <!-- /.dropdown -->
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
              </li>
              <li class="divider"></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
          </ul>
          <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->

  </ul>

{{------- SIDEBAR NAVIGATION -------}}

  <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
              <li class="sidebar-search">
                  <div class="input-group custom-search-form">
                      <input type="text" class="form-control" placeholder="Search...">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button">
                                  <i class="fa fa-search"></i>
                              </button>
                          </span>
                  </div>
                  <!-- /input-group -->
              </li>
              <li>
                  <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
              </li>

              <li>
                  <a href="#"><i class="fa fa-male" aria-hidden="true"></i> Users<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                      <li>
                      <a href="{{route('users.index')}}">All Users</a>
                      </li>

                      <li>
                      <a href="{{route('users.create')}}">Create User</a>
                      </li>

                  </ul>
                  <!-- /.nav-second-level -->
              </li>

              <li>
                  <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Posts<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                      <li>
                          <a href="{{route('posts.index')}}">All Posts</a>
                      </li>

                      <li>
                          <a href="{{route('posts.create')}}">Create Post</a>
                      </li>

                  </ul>
                  <!-- /.nav-second-level -->
              </li>


              <li>
                  <a href="{{route('categories.index')}}"><i class="fa fa-bars" aria-hidden="true"></i> Categories</a>
                  
                  <!-- /.nav-second-level -->
              </li>


              <li>
                  <a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i> Media<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                      <li>
                          <a href="{{route('media.index')}}">All Media</a>
                      </li>

                      <li>
                          <a href="{{route('media.create')}}">Upload Media</a>
                      </li>

                  </ul>
                  <!-- /.nav-second-level -->
              </li>

              <li>
                  <a href="{{route('comments.index')}}"><i class="fa fa-comment" aria-hidden="true"></i> Comments</a>
              </li>

          </ul>


      </div>
      <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>