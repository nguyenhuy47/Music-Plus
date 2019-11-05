@extends('layouts.master')
@section('content')
    <style>
        .gooey {
            position: absolute;
            top: 90%;
            left: 50%;
            width: 142px;
            height: 40px;
            margin: -20px 0 0 -71px;
            background: #ffffff00;
            filter: contrast(20);
        }

        .dot {
            position: absolute;
            width: 16px;
            height: 16px;
            top: 12px;
            left: 15px;
            filter: blur(1px);
            background: cyan;
            border-radius: 50%;
            transform: translateX(0);
            animation: dot 2.8s infinite;
        }

        .dots {
            transform: translateX(0);
            margin-top: 12px;
            margin-left: 31px;
            animation: dots 2.8s infinite;
        }

        .my-dot {
            display: block;
            float: left;
            width: 10px;
            height: 10px;
            margin-left: 16px;
            filter: blur(1px);
            background: cyan;
            border-radius: 50%;
        }


        @keyframes dot {
            50% {
                transform: translateX(55px)
            }
        }

        @keyframes dots {
            50% {
                transform: translateX(-31px)
            }
        }
    </style>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Thông báo</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                Đăng nhập thành công!
                            </div>
                            <div id="count-down" class="card-body" style="display: block"></div>
                            <div id="loading" class="gooey" style="display: none">
                                <span class="my-dot dot"></span>
                                <div class="dots">
                                    <span class="my-dot"></span>
                                    <span class="my-dot"></span>
                                    <span class="my-dot"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
@section('script')
    <script>
        let run;
        $(document).ready(function () {
            countDown();
        });

        function countDown() {
            let second = 3;
            let loading = document.getElementById('loading');
            let countDown = document.getElementById('count-down');
            countDown.innerHTML = 'Quay về trang chủ sau: ' + second + ' giây!';
            run = setInterval(function () {
                second--;
                countDown.innerHTML = 'Quay về trang chủ sau: ' + second + ' giây!';
                if (second <= 0) {
                    countDown.setAttribute("style", "display: none;");
                    loading.setAttribute('style', 'display:block');
                }
                if (second <= -3) {
                    clearInterval(run);
                    window.location = "/"
                }
            }, 1000);
        }
    </script>
@endsection

