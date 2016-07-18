@extends('layouts.master')

@section('title', '首页-比乐集')

@section('modules')
    <style type="text/css">
        input[text], button {
            margin: 0;
            color: #888;
            font-family: Cambria, Georgia, sans-serif;
        }

        header {
            background-color: #ffffff;
        }

        header .separator {
            width: 0;
            height: 14px;
            margin: 9px 4px;
            border-left: 1px solid #ccc;
            display: inline-block;
        }

        header .pull {
            height: 0;
            display: none;
            background-size: 100%;
            background-image: url('https://web.bileji.com/assets/images/pull.png');
        }

        header .pull .close {
            width: 15px;
            height: 15px;
            background: url('https://web.bileji.com/assets/images/close.png') -1px 55px;
        }

        header .header-blur {
            width: 100%;
            background-color: transparent;
        }

        header .header-blur .header-wrapper {
            height: 32px;
            width: 1230px;
            margin: auto;
        }

        header .header-blur .header-wrapper .left {
            padding: 0;
            height: 100%;
            width: 245px;
            display: block;
            margin: 0 auto 0 0;
            float: left;
        }

        header .header-blur .header-wrapper .left li {
            float: left;
        }

        header .header-blur .header-wrapper .left li div {
            padding: 10px 4px;
            line-height: 1em;
            font-weight: normal;
        }

        header .header-blur .header-wrapper .left li:first-child div {
            padding-left: 0;
        }

        header .header-blur .header-wrapper .right {
            padding: 0;
            height: 100%;
            width: 320px;
            display: block;
            margin: 0 0 0 auto;
        }

        header .header-blur .header-wrapper .right .contribute {
            width: 60px;
            height: 40px;
            position: relative;
            z-index: 10;
            border-radius: 0 0 5px 5px;
            -moz-border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
            padding: 0;
            line-height: 38px;
            background-color: #f25d8e;
            margin-left: 12px;
        }

        header .header-blur .header-wrapper .right .contribute a {
            font-size: 14px;
            color: #fff !important;
        }

        header .header-blur .header-wrapper .right li {
            float: right;
        }

        header .header-blur .header-wrapper .right li div {
            padding: 10px 4px;
            line-height: 1em;
            font-weight: normal;
        }

        header .header-blur .header-wrapper .right li:first-child div {
            padding-right: 0;
        }

        header .layer {
            height: 180px;
            background: url('https://web.bileji.com/assets/images/layer.png') center;
        }

        .container {
            padding: 0;
            width: 100%;
            min-width: 1230px;
            position: relative;
        }

        .container .menu-wrapper {
            width: 1230px;
            height: 62px;
            background-color: #ffffff;
            text-align: left;
            margin: auto;
        }

        .container .menu-wrapper ul li {
            width: auto;
        }

        .container .menu-wrapper ul li a {
            line-height: 62px;
            display: block;
            width: 80px;
            font-size: 14px;
            color: #222;
        }

        .container .menu-wrapper .menu-child-wrapper {
            width: 120px;
            position: relative;
            z-index: 1000;
            background-color: #ffffff;
            border: 1px solid #e5e9ef \9;
            border-top: 0;
            box-shadow: rgba(0,0,0,0.16) 0 2px 4px;
            border-radius: 0 0 4px 4px;
        }

        .container .menu-wrapper .menu-child-wrapper li {
            height: 35px;
            line-height: 35px;
        }

        .container .menu-wrapper .menu-child-wrapper li a {
            width: 100%;
            height: 100%;
            line-height: 35px;
            padding: 0 0 0 12px;
            border: 0;
            border-radius: 0;
        }

        .container .menu-wrapper .menu-child-wrapper li:last-child a {
            border-radius: 0 0 4px 4px;
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
            var dom = $("#pull");
            var delta = event.originalEvent.wheelDelta || event.originalEvent.detail;

            if (delta < 0 && dom.height() === 80 && (window.wheel_pull === true || window.wheel_pull === undefined)) {
                window.wheel_pull = false;
                dom.animate({
                    height: 0
                }, 600, "swing", function () {
                    window.wheel_pull = true;
                    dom.hide();
                });
            }
            if (window.close !== true && delta > 0 && $(document).scrollTop() === 0 && dom.height() === 0 && (window.wheel_push === true || window.wheel_push === undefined)) {
                window.wheel_push = false;
                dom.show().animate({
                    height: 80
                }, 600, "swing", function () {
                    window.wheel_push = true;
                });
            }
        });
        $(document).ready(function () {
            var dom = $("#pull");
            $("#close").click(function () {
                window.close = true;
                dom.animate({
                    height: 0
                }, 600, "swing", function () {
                    window.wheel_pull = true;
                    dom.hide();
                });
            });
        });
    </script>
@stop

@section('container')
    <header>
        <div class="pull" id="pull">
            <div class="close" id="close"></div>
        </div>
        <div class="header-blur">
            <div class="header-wrapper">
                <ul class="left">
                    <li>
                        <div>
                            <a>嗨~，欢迎来到比乐集！</a>
                        </div>
                    </li>
                </ul>
                <ul class="right">
                    <li>
                        <div class="contribute">
                            <a>投稿</a>
                        </div>
                    </li>
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
        </div>
        <div class="layer"></div>
    </header>
    <div class="container">
        <div class="list-group menu-wrapper">
            <ul>
                <li>
                    <a href="#">家常菜</a>
                    <ul class="menu-child-wrapper">
                        <li>
                            <a href="#" class="list-group-item"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp; 热菜</a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp; 凉菜</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="content">

        </div>
    </div>
    <footer>
        i am footer
    </footer>
@stop