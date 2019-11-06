<!doctype html>
<html lang="en">
<head>
    {{--<<<<<<< HEAD--}}
    @include('layouts.admin.title')
    @include('layouts.admin.link-css')
    @include('layouts.admin.link-script')
</head>
<body>
<!-- header -->
@include('layouts.admin.top-nav')
<!-- body -->
<div class="container-fluid alert-light">
    <div class="container pt-0">
        <div>
            @yield('content')
        </div>
        @include('layouts.admin.footer')
    </div>
</div>
@yield('script')
</body>
</html>
