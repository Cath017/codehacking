@include('includes.admin_header')

<div id="wrapper">
    <!-- Navigation -->
    @include('includes.admin_nav')
</div>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
                @include('includes.form_error')
                @yield('content')
                
            </div>
        </div>
    </div>
</div>
@include('includes.messages')
@include('includes.ckeditor')
@include('includes.admin_footer')

