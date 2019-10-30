

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="{{asset('css/style_menu.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
<link rel="stylesheet" href="{{asset('css/token-input.css')}} ">
<link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">
<link rel="stylesheet" href="{{asset('css/token-input.css')}}">
<link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
<script>
    var csrfToken = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    window.Laravel = csrfToken;
</script>


