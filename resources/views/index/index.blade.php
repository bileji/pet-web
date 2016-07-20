@extends('layouts.master')

@section('title', '首页-比乐集')

@section('modules')
    <link href="{{asset('node_modules/owlcarousel/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/owlcarousel/owl-carousel/owl.theme.css')}}" rel="stylesheet">
    <script src="{{asset('node_modules/owlcarousel/owl-carousel/owl.carousel.min.js')}}"></script>
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
            padding: 0;
            width: 60px;
            height: 40px;
            position: relative;
            z-index: 10;
            border-radius: 0 0 5px 5px;
            -moz-border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
            line-height: 38px;
            background-color: #f25d8e;
            margin-left: 12px;
        }

        header .header-blur .header-wrapper .right .contribute a {
            width: 100%;
            height: 100%;
            font-size: 14px;
            display: block;
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
            height: 42px;
            background-color: #ffffff;
            text-align: left;
            margin: auto;
        }

        .container .menu-wrapper .menu-item {
            float: left;
            width: 92px;
        }

        .container .menu-wrapper ul li {
            width: auto;
        }

        .container .menu-wrapper ul li .menu-title {
            line-height: 36px;
            display: block;
            width: 100%;
            font-size: 14px;
            color: #222;
            border-bottom: 2px solid white;
            transition: .3s all;
            -webkit-transition: .3s all;
            -moz-transition: .3s all;
            -o-transition: .3s all;
            padding: 6px 0 0 0;
        }

        .container .menu-wrapper ul li .menu-title:hover {
            color: #00a1d6;
            border-bottom: 2px solid orange;
            text-underline: none;
        }

        .container .menu-wrapper ul li .menu-title:active {
            text-underline: none;
        }

        .container .menu-wrapper ul li .menu-title:visited {
            text-underline: none;
        }

        .container .menu-wrapper ul li:first-child a:hover {
            border-bottom: 2px solid white;
        }

        .container .menu-wrapper ul li .menu-title i {
            color: orange;
        }

        .container .menu-wrapper .menu-child-wrapper {
            width: 120px;
            position: absolute;
            z-index: 1000;
            background-color: #ffffff;
            border: 1px solid #e5e9ef \9;
            border-top: 0;
            box-shadow: rgba(0, 0, 0, 0.16) 0 2px 4px;
            border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            -webkit-border-radius: 0 0 4px 4px;
            display: none;
        }

        .container .menu-wrapper .menu-child-wrapper li {
            height: 30px;
        }

        .container .menu-wrapper .menu-child-wrapper li a {
            border: 0;
            width: 100%;
            height: 100%;
            padding: 0 0 0 12px;
            border-radius: 0;
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            white-space: nowrap;
            transition: .25s all;
            -webkit-transition: .25s all;
            -moz-transition: .25s all;
            -o-transition: .25s all;
            font-size: 12px;
            line-height: 30px;
        }

        .container .menu-wrapper .menu-child-wrapper li a:hover {
            padding: 0 0 0 16px;
            color: orange;
        }

        .container .menu-wrapper .menu-child-wrapper li:last-child a {
            border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            -webkit-border-radius: 0 0 4px 4px;
        }

        .container .content {
            width: 1230px;
            margin: auto;
        }

        .container .content .top-wrapper {
            margin-top: 4px;
            background-color: #f8f8f8;
        }

        .container .content .top-wrapper .carousel-wrapper:hover {
            cursor: pointer;
        }

        .container .content .top-wrapper .carousel-wrapper .owl-theme {
            height: 100%;
        }

        .container .content .top-wrapper .carousel-wrapper .owl-theme .owl-controls {
            margin-top: -28px;
            position: relative;
        }

        .container .content .top-wrapper .carousel-wrapper {
            width: 400px;
            height: 200px;
            overflow: hidden;
            position: relative;
            z-index: 100;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        .container .content .top-wrapper .carousel-wrapper .owl-carousel .owl-wrapper-outer img {
            width: 400px;
            height: 200px;
        }

        .container .content .top-wrapper .carousel-wrapper .owl-carousel .owl-controls .owl-page span {
            background-color: #ffffff;
        }

        .container .content .top-wrapper .carousel-wrapper .owl-carousel .owl-controls .owl-page.active span, .container .content .top-wrapper .carousel-wrapper .owl-carousel .owl-controls.clickable .owl-page:hover span {
            background-color: #ffffff;
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

            $(".menu-item").mouseover(function () {
                $("ul", this).show();
            }).mouseleave(function () {
                $("ul", this).hide();
            });

            // 轮播
            $(".owl-carousel").owlCarousel({
                items     : 1,
                autoPlay  : true,
                singleItem: true
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
                <li class="menu-item">
                    <a href="#" class="menu-title">
                        <i class="fa fa-joomla" aria-hidden="true"></i>&nbsp; 比乐集
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-title">中国菜谱</a>
                    <ul class="menu-child-wrapper">
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;鲁菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;川菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;粤菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;闽菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;苏菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;浙菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;湘菜
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;徽菜
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-title">外国料理</a>
                    <ul class="menu-child-wrapper">
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;韩国料理
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;日本料理
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;法国大餐
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;意大利美食
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-title">西式糕点</a>
                    <ul class="menu-child-wrapper">
                        <li><a href="#" class="list-group-item"><i class="fa fa-angle-right fa-fw"
                                                                   aria-hidden="true"></i>&nbsp;蛋糕面包</a></li>
                        <li><a href="#" class="list-group-item"><i class="fa fa-angle-right fa-fw"
                                                                   aria-hidden="true"></i>&nbsp;饼干配方</a></li>
                        <li><a href="#" class="list-group-item"><i class="fa fa-angle-right fa-fw"
                                                                   aria-hidden="true"></i>&nbsp;甜品点心</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-title">特色小吃</a>
                    <ul class="menu-child-wrapper">
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;蛋糕面包
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;饼干配方
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;甜品点心
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-title">黑暗料理</a>
                    <ul class="menu-child-wrapper">
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;蛋糕面包
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;饼干配方
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>&nbsp;甜品点心
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="content">
            <section class="top-wrapper">
                <div class="carousel-wrapper">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage1.jpg"
                                 alt="The Last of us">
                        </div>
                        <div class="item">
                            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage2.jpg"
                                 alt="The Last of us">
                        </div>
                        <div class="item">
                            <img src="http://owlgraphic.com/owlcarousel/demos/assets/fullimage3.jpg"
                                 alt="The Last of us">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer></footer>
@stop