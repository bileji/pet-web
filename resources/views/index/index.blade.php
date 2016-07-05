@extends('layouts.master')

@section('title', '首页-比乐集')

@section('modules')
    <style type="text/css">
        input[text], button {
            margin: 0;
            color: #888;
            font-family: Cambria, Georgia, sans-serif;
        }

        .separator {
            width: 0;
            height: 14px;
            margin: 9px 4px;
            border-left: 1px solid #ccc;
            display: inline-block;
        }

        .nav-pull {
            height: 80px;
            background-size: 100%;
            background-image: url('http://web.bileji.com/assets/images/banner_background.png');
        }

        .nav-banner {
            height: 32px;
            width: 1230px;
            margin: auto;
            background-color: #e8e8e8;
        }

        .nav-left {
            padding: 0;
            height: 100%;
            width: 245px;
            display: block;
            margin: 0 auto 0 0;
            float: left;
        }

        .nav-left li {
            float: left;
        }

        .nav-left li div {
            padding: 10px 4px;
            line-height: 1em;
            font-weight: normal;
        }

        .nav-left li:first-child div {
            padding-left: 0;
        }

        .nav-right {
            padding: 0;
            height: 100%;
            width: 245px;
            display: block;
            margin: 0 0 0 auto;
        }

        .nav-right li {
            float: right;
        }

        .nav-right li div {
            padding: 10px 4px;
            line-height: 1em;
            font-weight: normal;
        }

        .nav-right li:first-child div {
            padding-right: 0;
        }

        .container {
            padding: 0;
            width: 100%;
            min-width: 1230px;
            position: relative;
        }

        .container .content {
            height: 800px;
            width: 1230px;
            margin: auto;
            background-color: #f8f8f8;
        }
    </style>

    <script type="text/javascript">
        $(document).on("mousewheel DOMMouseScroll", function (event) {
            var dom = $("#nav-pull");
            var delta = event.originalEvent.wheelDelta || event.originalEvent.detail;

            if (delta === 0) {
                if (window.last < 0 && dom.height() === 80) {
                    dom.animate({
                        height: 0
                    }, 600, "swing");
                }
                if (window.last > 0 && $(document).scrollTop() === 0 && dom.height() === 0) {
                    dom.animate({
                        height: 80
                    }, 600, "swing");
                }
            }

            window.last = delta;
        });
    </script>
@stop

@section('container')
    <header>
        <div class="nav-pull" id="nav-pull"></div>
        <div class="nav-banner">
            <ul class="nav-left">
                <li>
                    <div>
                        <a>所在城市:</a>
                        <a>成都</a>
                    </div>
                </li>
            </ul>
            <ul class="nav-right">
                <li>
                    <div>
                        <a>站内导航</a>
                    </div>
                </li>
                <li>
                    <div>
                        <a>商家支持</a>
                    </div>
                </li>
                <li>
                    <div>
                        <a>我的菜谱</a>
                    </div>
                </li>
                <li class="separator"></li>
                <li>
                    <div>
                        <a href="{{url('user/sign_up')}}">注册</a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{url('user/sign_in')}}">登录</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="content">

        </div>
    </div>
    <footer>
        i am footer
    </footer>
@stop