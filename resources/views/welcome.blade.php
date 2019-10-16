<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
    {{--        <script src="ckeditor4/ckeditor/ckeditor.js"></script>--}}
    {{--        <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>--}}
    <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
</head>
<body>
<div>
    <textarea name="" id="ckeditor1" cols="30" rows="10"></textarea>
</div>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="uv3_upload_box">
        <div id="paymentSuccess" class="hide">
            <div class="alert success"><span class="icon"></span>
                <div class="content_alert" style="width: 90%;">Bạn đã đăng ký NHACCUATUI VIP thành công. Vui lòng
                    refresh lại trang để sử dụng tính năng Tải lên và Duyệt nhanh!
                </div>
            </div>
        </div>
        <div class="form-edit"></div>
        <form method="post" id="formUploadHidden" enctype="multipart/form-data" novalidate=""
              class="box has-advanced-upload" style="display: none;">
            <div class="box__input">
                <input type="file" name="file" id="inputUploadHidden" class="box__file"
                       accept=".mp3,.wma,.mp2,.asf,.wav,.wmv,.mp4,.flv,.mpg,.mpe,.avi,.3gp,.dat,.flac">
                <div class="icon_upload_v3"></div>
                <div class="title_upload_v3">Chọn hoặc kéo thả file để tải lên</div>
                <div class="desc_upload_v3">Hỗ trợ các định dạng .mp3, .wma, .mp2, .asf, .wav, .wmv, .mp4, .flv, .mpg,
                    .mpe, .avi, .3gp, .dat, .flac
                    <div style="margin-top: 10px;">Hỗ trợ embed link Youtube</div>
                </div>
                <label id="labelInputUpload" for="inputUploadHidden"><strong>Chọn file</strong></label>
            </div>
            <div class="box__input__drag"></div>
        </form>
        <div class="box_info_upload" style="display: block;">
            <div class="file_box">
                <div class="avatar_small_upload">
                    <img width="50" height="50" id="avatar_small_upload" style="display: none;">
                </div>
                <div class="title_small_upload">Victory</div>
                <div class="info_small_upload">3.16MB / MP3</div>
            </div>
            <div class="form_edit_upload">
                <div class="input-group">
                    <label class="label" for="txtSongname">Tên bài hát, video:</label>
                    <div class="edit-user-content">
                        <input class="input" type="text" id="txtSongName" name="playlist-name" value=""
                               style="width:500px">
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="input-group">
                    <label class="label" for="txtAddr">Ca sĩ, diễn viên trình diễn:</label>
                    <div class="edit-user-content">
                        <ul class="token-input-list-facebook input" style="width:500px;">
                            <li class="token-input-input-token-facebook"><input type="text" autocomplete="off"
                                                                                id="token-input-playlist-singer"
                                                                                style="outline: none;">
                                <tester
                                    style="position: absolute; top: -9999px; left: -9999px; width: auto; font-size: 14px; font-family: NhacCuaTui, sans-serif; font-weight: 400; letter-spacing: 0px; white-space: nowrap;"></tester>
                            </li>
                        </ul>
                        <input class="input" type="text" id="playlist-singer" name="playlist-singer" autocomplete="off"
                               value="" style="width: 500px; display: none;">
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="input-group">
                    <label class="label" for="selGenre">Thể loại</label>
                    <div class="edit-user-content">
                        <select id="selGenre" name="playlist-genre" style="width:200px;">
                            <option rel="" class="" selected="" value="">Chọn thể loại</option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Việt Nam</option>
                            <option rel="mv" class="ulMV" value="5142" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Trẻ
                            </option>
                            <option rel="mv" class="ulMV" value="5143" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trữ
                                Tình
                            </option>
                            <!--<option rel="mv" class="ulMV" value="5146">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quê Hương</option>-->
                            <option rel="mv" class="ulMV" value="5144" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cách
                                Mạng
                            </option>

                            <option rel="mv" class="ulMV" value="5147" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rap
                                Việt
                            </option>
                            <option rel="mv" class="ulMV" value="5148" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rock
                                Việt
                            </option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Âu Mỹ</option>
                            <option rel="mv" class="ulMV" value="5124" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pop</option>
                            <option rel="mv" class="ulMV" value="5125" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rock</option>
                            <option rel="mv" class="ulMV" value="5126" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronica/Dance</option>
                            <option rel="mv" class="ulMV" value="5127" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R&amp;B/HipHop/Rap</option>
                            <option rel="mv" class="ulMV" value="5128" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blues/Jazz</option>
                            <option rel="mv" class="ulMV" value="5129" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country</option>
                            <option rel="mv" class="ulMV" value="5130" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latin</option>
                            <option rel="mv" class="ulMV" value="5131" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indie</option>
                            <option rel="mv" class="ulMV" value="5132" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Âu
                                Mỹ khác
                            </option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Châu Á</option>
                            <option rel="mv" class="ulMV" value="5020" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Hàn
                            </option>
                            <option rel="mv" class="ulMV" value="5022" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Hoa
                            </option>
                            <option rel="mv" class="ulMV" value="5021" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Nhật
                            </option>
                            <option rel="mv" class="ulMV" value="5260" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Thái
                            </option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Karaoke</option>
                            <option rel="mv" class="ulMV" value="5273" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Nhạc Trẻ
                            </option>
                            <option rel="mv" class="ulMV" value="5274" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Trữ Tình
                            </option>
                            <option rel="mv" class="ulMV" value="5275" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Remix Việt
                            </option>
                            <option rel="mv" class="ulMV" value="5276" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Thiếu Nhi
                            </option>
                            <option rel="mv" class="ulMV" value="5277" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Âu Mỹ
                            </option>
                            <option rel="mv" class="ulMV" value="5278" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Karaoke
                                Thể Loại Khác
                            </option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Khác</option>
                            <option rel="mv" class="ulMV" value="7" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clip
                                Vui
                            </option>
                            <option rel="mv" class="ulMV" value="5150" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hài
                                Kịch
                            </option>
                            <option rel="mv" class="ulMV" value="5145" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thiếu
                                Nhi
                            </option>
                            <option rel="mv" class="ulMV" value="5152" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giải
                                Trí Khác
                            </option>
                            <option rel="mv" class="ulMV" value="5023" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thể
                                Loại Khác
                            </option>
                            <option rel="mv" class="ulMV" disabled="" style="display: none;">Phim</option>
                            <option rel="mv" class="ulMV" value="5154" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Việt Nam
                            </option>
                            <option rel="mv" class="ulMV" value="5156" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Trung Quốc
                            </option>
                            <option rel="mv" class="ulMV" value="5157" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Thái Lan
                            </option>
                            <option rel="mv" class="ulMV" value="5158" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Hoạt Hình
                            </option>
                            <option rel="mv" class="ulMV" value="5155" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Hàn Quốc
                            </option>
                            <option rel="mv" class="ulMV" value="5160" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Thiếu Nhi
                            </option>
                            <option rel="mv" class="ulMV" value="5161" style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phim
                                Nhật Bản
                            </option>
                            <option rel="song" class="ulSONG" disabled="">Việt Nam</option>
                            <option rel="song" class="ulSONG" value="5015" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Trẻ
                            </option>
                            <option rel="song" class="ulSONG" value="5000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trữ
                                Tình
                            </option>
                            <option rel="song" class="ulSONG" value="5001">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cách
                                Mạng
                            </option>
                            <option rel="song" class="ulSONG" value="5004">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiền
                                Chiến
                            </option>
                            <option rel="song" class="ulSONG" value="5003">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Trịnh
                            </option>
                            <option rel="song" class="ulSONG" value="5006">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rap
                                Việt
                            </option>
                            <option rel="song" class="ulSONG" value="5103">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rock
                                Việt
                            </option>
                            <option rel="song" class="ulSONG" value="5262">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remix
                                Việt
                            </option>
                            <option rel="song" class="ulSONG" disabled="">Âu Mỹ</option>
                            <option rel="song" class="ulSONG" value="5133">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pop
                            </option>
                            <option rel="song" class="ulSONG" value="5134">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rock
                            </option>
                            <option rel="song" class="ulSONG" value="5135">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronica/Dance</option>
                            <option rel="song" class="ulSONG" value="5136">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R&amp;B/Hip
                                Hop/Rap
                            </option>
                            <option rel="song" class="ulSONG" value="5137">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blues/Jazz</option>
                            <option rel="song" class="ulSONG" value="5138">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country
                            </option>
                            <option rel="song" class="ulSONG" value="5139">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latin
                            </option>
                            <option rel="song" class="ulSONG" value="5140">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indie
                            </option>
                            <option rel="song" class="ulSONG" value="5153">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Âu Mỹ
                                khác
                            </option>
                            <option rel="song" class="ulSONG" disabled="">Châu Á</option>
                            <option rel="song" class="ulSONG" value="5010">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Hàn
                            </option>
                            <option rel="song" class="ulSONG" value="5009">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Hoa
                            </option>
                            <option rel="song" class="ulSONG" value="5011">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Nhật
                            </option>
                            <option rel="song" class="ulSONG" value="5259">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhạc
                                Thái
                            </option>
                            <option rel="song" class="ulSONG" disabled="">Khác</option>
                            <option rel="song" class="ulSONG" value="5005">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thiếu
                                Nhi
                            </option>
                            <option rel="song" class="ulSONG" value="5002">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Không
                                Lời
                            </option>
                            <option rel="song" class="ulSONG" value="5257">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beat
                            </option>
                            <option rel="song" class="ulSONG" value="5012">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thể Loại
                                Khác
                            </option>
                            <option rel="song" class="ulSONG" value="5007">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tui Hát
                            </option>
                        </select>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="right_form_edit_upload">
                    <div id="avatar_big_upload"><label id="labelImageInputUpload" for="fileAvatar"></label></div>
                </div>

                <div class="input-group">
                    <a href="javascript:;" onclick="resetFormUpload();" class="btn_reset_form_upload">HỦY</a>
                    <div class="list_button_submit">

                        <a href="javascript:;" class="btn btn_accept_item vip_button_upload" id="btnStartUpload"
                           title="Tải nhanh, duyệt trong 12h" style="opacity: 1;">
                            <span class="icon_vip_upload"></span>
                            Tải nhanh, duyệt trong 12h
                        </a>


                    </div>
                    <div class="clr"></div>
                </div>
            </div>

            <div id="duplicate" class="duplicate_upload_v3">
                <div class="title_duplicate_upload_v3">Bài hát này đang trùng với nội dung có sẵn trên NhacCuaTui</div>
                <div class="box_duplicate_upload_v3">
                    <div class="image_duplicate_upload_v3"></div>
                    <div class="song_duplicate_upload_v3"></div>
                    <div class="artist_duplicate_upload_v3"></div>
                    <div class="genre_duplicate_upload_v3"></div>
                    <a class="button_duplicate_upload_v3">Nghe Nhạc</a>
                </div>
                <a href="https://www.nhaccuatui.com/dang_nhac" class="reload_duplicate_upload_v3">Tải Lại</a>
            </div>
        </div>
        <div class="box" id="uploading" style="display: none;">
            <div id="cont_uploading" class="cont">
                <a class="music_upload_icon"></a>
                <a id="file_type" class="file_type_upload_loading">.mp3</a>
                <svg class="svgCi small" width="144" height="144" viewBox="0 0 36 36" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">'
                    <path class="circle-bg" style="stroke: #e1e1e1;"
                          d="M18 2.0845  a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                </svg>
                <svg id="svg_uploading" class="svgCi" width="164" height="164" viewBox="0 0 36 36" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">'
                    <path class="circle-bg"
                          d="M18 2.0845  a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <path id="bar_uploading" class="circle" stroke-dasharray="0, 100"
                          d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                </svg>
            </div>
            <div class="title_upload_v3_sucess">Đang upload ... <span class="txtper">0</span>%</div>
            <div class="info_noti_upload_v3_success">Vui lòng chờ trong một vài phút và đừng ngắt kết nối mạng trong quá
                trình upload
            </div>
        </div>

        <div id="uploadSuccess" class="box hide">
            <div class="box__input">
                <div class="icon_upload_v3 success"></div>
                <div class="title_upload_v3_sucess">Bạn đã tải lên thành công</div>


                <div class="info_noti_upload_v3_success">Chúng tôi sẽ tiến thành duyệt nội dung của bạn trong vòng 12
                    tiếng. <a href="https://www.nhaccuatui.com/nhaccuatui-vip/gioi-thieu" target="_blank">Tìm hiểu thêm
                        về quyền lợi NhacCuaTui VIP</a></div>


                <a href="https://www.nhaccuatui.com/dang_nhac" class="taithem_upload_v3">Tải thêm</a>
                <a href="https://www.nhaccuatui.com/" class="quayvetrangchu_upload_v3">Quay về trang chủ</a>
            </div>
        </div>


    </div>
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
<script> CKEDITOR.replace('ckeditor1')</script>
</body>
</html>
