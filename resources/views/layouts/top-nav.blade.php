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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bài hát</a>
                            <ul class="dropdown-menu multi-column columns-2">
                                <li>
                                    <ul class="multi-column-dropdown col-sm-6">
                                        <li><a href="{{URL::to('songnew')}}">Nhạc mới</a></li>
                                        <li><a href="{{ URL::to('songvn') }}">Nhạc Trẻ</a></li>
                                        <li><a href="{{ URL::to('trutinh') }}">Trữ Tình</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Rock Việt</a></li>
                                        <li><a href="#">Rap Việt</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="multi-column-dropdown col-sm-6">
                                        <li><a href="#">Nhạc Hoa</a></li>
                                        <li><a href="{{ URL::to('songuk') }}">Âu Mỹ</a></li>
                                        <li><a href="#">Nhạc Hàn</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Hòa Tấu </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Thể Loại Khác</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Playlist</a>
                            <ul class="dropdown-menu multi-column columns-2">
                                <li>
                                    <ul class="multi-column-dropdown col-sm-6">
                                        <li><a href="#">Mới - Hot</a></li>
                                        <li><a href="#">Nhạc Trẻ</a></li>
                                        <li><a href="#">Trữ Tình</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Rock Việt</a></li>
                                        <li><a href="#">Rap Việt</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="multi-column-dropdown col-sm-6">
                                        <li><a href="#">Nhạc Hoa</a></li>
                                        <li><a href="#">Âu Mỹ</a></li>
                                        <li><a href="#">Nhạc Hàn</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Hòa Tấu </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Thể Loại Khác</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chủ đề</a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <ul class="multi-column-dropdown col-sm-4 col-xs-12">
                                        <li><a href="#">The Best Of 2017</a></li>
                                        <li><a href="#">Coffe Time</a></li>
                                        <li><a href="#">Acoustic</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Cover - Mashup</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Do You Travel</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="multi-column-dropdown col-sm-4 col-xs-12">
                                        <li><a href="#">Nhạc Xuân</a></li>
                                        <li><a href="#">Nhạc Vàng</a></li>
                                        <li><a href="#">Cải Lương</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Nhạc V-POP</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Nhạc K-POP</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="multi-column-dropdown col-sm-4 col-xs-12">
                                        <li><a href="#">EDM Sôi Động</a></li>
                                        <li><a href="#">Nhạc Remix</a></li>
                                        <li><a href="#">Nonstop</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Electronic</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Tin tức âm nhạc</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                                            <li><a href="{{ URL::to('/manage/songs') }}">Bài hát</a></li>
                                            <li class="divider"></li>
{{--                                            <li><a href="{{ URL::to('singers.store') }}">Ca sĩ</a></li>--}}

                                            <li><a href="{{route('singers.index')}}">Ca sĩ</a></li>

                                            <li class="divider"></li>
                                            <li><a href="{{ route('artists.index') }}">Nhạc sĩ</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{ URL::to('/manage/playlist') }}">Playlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="{{ route('songs.create') }}">Upload</a></li>
                    </ul> <!-- END_urQuanLy -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }} ">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
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
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
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
