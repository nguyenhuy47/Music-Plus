<div class="container-fluid bg-light border-bottom sticky-top ">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <a class="navbar-brand m-0 p-0" href="{{ URL::to('/') }}" style="width: 150px">
                <img src="{{asset('/img/logo.png')}}" class="w-75" title="Nghe nhạc thêm yêu cuộc sống">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left side of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ URL::to('/') }}">Trang Chủ <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guest.playlists.list')}}" aria-haspopup="true" aria-expanded="false">
                            Playlists
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guest.songs.list')}}" aria-haspopup="true" aria-expanded="false">
                            Bài Hát
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guest.singers.list')}}" aria-haspopup="true" aria-expanded="false">
                            Ca sĩ
                        </a>
                    </li>
                    @if (Auth::guest())
                        {{--                        <li><a href="{{ url('/login') }}">Login</a></li>--}}
                        {{--                        <li><a href="{{ url('/register') }}">Register</a></li>--}}
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Quản Lý
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('songs.list')}}">Bài hát</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('singers.list')}}">Ca sĩ</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('artists.list') }}">Nhạc sĩ</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('playlists.list') }}">Playlists</a>
                            </div>
                        </li>
                    @endif
                    <li><a href="{{ route('songs.create') }}" class="nav-link">Tải lên</a></li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <!-- search bar -->
                    <form class="form-inline my-3 my-lg-0" action="{{route('search.searchByName')}}"
                          method="get">
                        <span>
                        <select class="custom-select" name="search" style="border-radius: 25px 0px 0px 25px">
                            <option value="songs">Bài hát</option>
                            <option value="playlists">Playlist</option>
                            <option value="singers">Ca sĩ</option>
{{--                            <option value="all">Tất cả</option>--}}
                        </select>
                            </span>
                        <span>
                        <input class="form-control" type="search" name="keySearch" placeholder="Tìm kiếm..."
                               aria-label="Search">
                        </span>
                        <span>
                            <button class="btn btn-info my-2 my-sm-0"
                                    style="border-radius: 0px 25px 25px 0px" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                    </span>
                    </form>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav navbar-right ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
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
                                    {{ __('Đăng xuất') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{route('profile')}}">
                                    Thông tin người dùng
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>

