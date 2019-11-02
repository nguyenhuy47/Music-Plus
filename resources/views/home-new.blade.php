<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Plus</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Booostrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <!-- CSS -->

</head>
<body>

<!-- header -->
<div class="container-fluid bg-light border border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand m-0 p-0" href="#" style="width: 150px">
                <img src="https://ar.toneden.io/21992223/dd63b4a9-5e31-4380-8ca9-228d652b73f0" class="w-75">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left side of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Playlists
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">V-pop</a>
                            <a class="dropdown-item" href="#">US - UK</a>
                            <a class="dropdown-item" href="#">K-pop</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Others</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Songs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">V-pop</a>
                            <a class="dropdown-item" href="#">US - UK</a>
                            <a class="dropdown-item" href="#">K-pop</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Others</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Management
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Songs</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Singers</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Artists</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Playlists</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Upload</a>
                        </div>
                    </li>
                </ul>

                <!-- search bar -->
                <form class="form-inline my-2 my-lg-0">
                        <span>
                        <select class="custom-select" style="border-radius: 25px 0px 0px 25px">
                            <option value="song" selected>Song</option>
                            <option value="playlist">Playlist</option>
                            <option value="singer">Singer</option>
                        </select>
                            </span>
                    <span>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </span>
                    <span>
                            <button class="btn btn-outline-success my-2 my-sm-0"
                                    style="border-radius: 0px 25px 25px 0px" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                    </span>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- body -->
<div class="container-fluid" style="background-color: #EEEEEE">
    <div class="container p-0" style="background-color: white">

        <!-- slide -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://avatar-nct.nixcdn.com/slideshow/2019/10/29/3/4/5/7/1572314172258_org.jpg"
                         class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://avatar-nct.nixcdn.com/slideshow/2019/10/28/5/0/e/b/1572236776564_org.jpg"
                         class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://avatar-nct.nixcdn.com/slideshow/2019/10/30/b/f/4/3/1572408318194_org.jpg"
                         class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- new playlists -->
        <div>
            <div class="row mt-5">
                <div class="col-6">
                        <span class="float-left font-weight-bold ml-5">
                            <h3>New Playlist</h3>
                        </span>
                </div>
                <div class="col-6">
                        <span class="float-right mb-3 mr-5">
                            <a class="btn btn-outline-info" href="">Show all</a>
                        </span>
                </div>
            </div>

            <div class="ml-5 mr-5 mb-5">
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/23/7/8/b/5/1571804802390.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/29/7/c/1/5/1572339116027.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/25/d/7/6/c/1571975282431.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/21/4/6/1/e/1571641021875.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/25/d/7/6/c/1571974008674.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571718224366.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571733581187.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/17/7/2/d/f/1571282640291.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Song name</a></p>
                                    <p class="mb-0"><a>Singer</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- space -->
        <div style="background-color: #EEEEEE; height: 50px"></div>

        <!-- popular playlist -->
        <div>
            <div class="row mt-5">
                <div class="col-6">
                        <span class="float-left font-weight-bold ml-5">
                            <h3>Popular Playlist</h3>
                        </span>
                </div>
                <div class="col-6">
                        <span class="float-right mb-3 mr-5">
                            <a class="btn btn-outline-info" href="">Show all</a>
                        </span>
                </div>
            </div>
            <div class="ml-5 mr-5 mb-5">
                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/23/7/8/b/5/1571804802390.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/29/7/c/1/5/1572339116027.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/25/d/7/6/c/1571975282431.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/21/4/6/1/e/1571641021875.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/25/d/7/6/c/1571974008674.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571718224366.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571733581187.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                                <div class="col">
                                    <img
                                        src="https://avatar-nct.nixcdn.com/song/2019/10/17/7/2/d/f/1571282640291.jpg"
                                        class="d-block w-100" alt="...">
                                    <p class="mb-0"><a>Playlist name</a></p>
                                    <p class="mb-0"><a>Author</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- space -->
        <div style="background-color: #EEEEEE; height: 50px"></div>

        <!-- new song & popular song -->
        <div style="background-color: white">
            <div class="row mt-5 mb-4">

                <!-- new songs -->
                <div class="col-6 border-right">
                    <div class="font-weight-bold ml-5 mb-3">
                        <h3>New Songs</h3>
                    </div>
                    <div class="ml-4">
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/23/7/8/b/5/1571804802390.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Nghe nói anh sắp kết hôn</div>
                                        <div>Văn Mai Hương, Hà Anh Tuấn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/29/7/c/1/5/1572339116027.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>I Don't Wanna Let You Go</div>
                                        <div>Mr. A</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571718224366.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Hongkong 12</div>
                                        <div>Nguyễn Trọng Tài, MC 12</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/09/16/b/0/f/f/1568593417642.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Cô Thắm Không Về</div>
                                        <div>Phát Hồ, Jokes Bii, Thiện</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/08/28/7/4/3/a/1566982655403.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Đi Đu Đưa Đi</div>
                                        <div>Bích Phương</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-outline-info" href="">Show more</a>
                    </div>
                </div>

                <!-- popular songs -->
                <div class="col-6 border-left">
                    <div class="font-weight-bold ml-5 mb-3">
                        <h3>Popolar Songs</h3>
                    </div>
                    <div class="ml-4">
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/23/7/8/b/5/1571804802390.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Nghe nói anh sắp kết hôn</div>
                                        <div>Văn Mai Hương, Hà Anh Tuấn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/29/7/c/1/5/1572339116027.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>I Don't Wanna Let You Go</div>
                                        <div>Mr. A</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571718224366.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Hongkong 12</div>
                                        <div>Nguyễn Trọng Tài, MC 12</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/09/16/b/0/f/f/1568593417642.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Cô Thắm Không Về</div>
                                        <div>Phát Hồ, Jokes Bii, Thiện</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <img src="https://avatar-nct.nixcdn.com/song/2019/08/28/7/4/3/a/1566982655403.jpg"
                                         style="width: 50px; height: 50px" href="">
                                </div>
                                <div class="col-11">
                                    <div class="ml-3">
                                        <div>Đi Đu Đưa Đi</div>
                                        <div>Bích Phương</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-outline-info" href="">Show more</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- space -->
        <div style="background-color: #EEEEEE; height: 50px"></div>

        <!-- singers -->
        <div style="background-color: white">
            <div class="row mt-5">
                <div class="col-6">
                        <span class="float-left font-weight-bold ml-5">
                            <h3>Singers</h3>
                        </span>
                </div>
                <div class="col-6">
                        <span class="float-right mb-3 mr-5">
                            <a class="btn btn-outline-info" href="">Show all</a>
                        </span>
                </div>
            </div>
            <div id="singersSlide" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <div class="row ml-5 mr-5">
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/10/23/5/b/0/b/1571802458800.jpg" class="border rounded-circle">
                                <p class="mt-1">Hoàng Thùy Linh</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/12/c/3/c/7/1568279069160.jpg" class="border rounded-circle">
                                <p class="mt-1">Bích Phương</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/26/1/d/b/5/1569474237302.jpg" class="border rounded-circle">
                                <p class="mt-1">Hari Won</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2018/02/13/b/9/3/2/1518508910343.jpg" class="border rounded-circle">
                                <p class="mt-1">Khắc Việt</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <div class="row ml-5 mr-5">
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/10/23/5/b/0/b/1571802458800.jpg" class="border rounded-circle">
                                <p class="mt-1">Hoàng Thùy Linh</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/12/c/3/c/7/1568279069160.jpg" class="border rounded-circle">
                                <p class="mt-1">Bích Phương</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/26/1/d/b/5/1569474237302.jpg" class="border rounded-circle">
                                <p class="mt-1">Hari Won</p>
                            </div>
                            <div class="col-3">
                                <img src="https://avatar-nct.nixcdn.com/singer/avatar/2018/02/13/b/9/3/2/1518508910343.jpg" class="border rounded-circle">
                                <p class="mt-1">Khắc Việt</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#singersSlide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#singersSlide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- space -->
        <div style="background-color: #EEEEEE; height: 50px"></div>
    </div>
</div>

<!-- footer -->
<div class="container-fluid bg-dark border-top">
    <div class="float-right mt-3 mb-3">
        <p>@Copyright: Gift from Kien</p>
    </div>
</div>


</body>
</html>
