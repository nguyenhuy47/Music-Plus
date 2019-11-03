<div id="menu" class="alert-primary sticky-top">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" title="Nghe nhạc thêm yêu cuộc sống" href="{{ URL::to('/') }}">Music
                        Plus</a>
                </div>
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="{{route('guest.songs.index')}}">Bài hát</a>
                        </li>
                        <li>
                            <a href={{route('guest.playlists.index')}}>Playlist</a>
                        </li>
                        <li>
                            <a href="{{route('guest.singers.index')}}">Ca sĩ</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                    @if (Auth::guest())
                        <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý</a>
                                <ul class="dropdown-menu multi-column columns-1">
                                    <li>
                                        <ul class="multi-column-dropdown col-sm-8">
                                            <li><a href="{{ URL::to('/manager/songs') }}">Bài hát</a></li>
                                            <li class="divider"></li>
{{--                                            <li><a href="{{ URL::to('singers.store') }}">Ca sĩ</a></li>--}}

                                            <li><a href="{{route('singers.index')}}">Ca sĩ</a></li>

                                            <li class="divider"></li>
                                            <li><a href="{{ route('artists.index') }}">Nhạc sĩ</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{ URL::to('/manager/playlist') }}">Playlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul> <!-- END_urQuanLy -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }} ">Đăng nhập</a></li>

                            <li><a href="{{ url('/register') }}">Đăng ký</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                    <a class="dropdown-item" href="/profile">
                                        Thông tin người dùng
                                    </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul> <!-- END_urLOGIN -->
                    <div class="row" style="float: right; margin-right: 1em">
                        <div class="input-group" style="margin-top: 10px;padding-left: 50px; width: 48em;">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Tìm kiếm theo</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#contains">Bài hát</a></li>
                                    <li><a href="#its_equal">Ca sĩ</a></li>
                                    <li><a href="#greather_than">Album</a></li>
                                    <li><a href="#less_than">Playlist</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#all">Tất cả</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
				                    <button class="btn btn-default" type="button"><span
                                            class="glyphicon glyphicon-search"></span></button>
				                </span>
                        </div>
                    </div>
                </div>
                <!--/.navbar-collapse-->
            </nav>
        </div>
    </div>
</div> <!-- menu -->
