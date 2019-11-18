<!doctype html>
<html lang="en">
<head>
    @include('layouts.admin.title')
    @include('layouts.admin.link-css')
    @yield('style')
</head>
<body>
<!-- header -->
@include('layouts.admin.top-nav')
<!-- body -->
<div class="container-fluid alert-light">
    <div class="container pt-3">
        <div>
            @yield('content')
        </div>
{{--        @include('layouts.admin.footer')--}}
    </div>
</div>
@include('layouts.admin.link-script')
@yield('script')
</body>
</html>
