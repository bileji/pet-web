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
            height: 46px;
            background-color: #ffffff;
            text-align: left;
            margin: auto;
            position: relative;
        }

        .container .menu-wrapper .menu-item {
            float: left;
            width: auto;
            padding: 0 10px 0 0;
            transition: .3s all;
            -moz-transition: .3s all;
            -webkit-transition: .3s all;
        }

        .container .menu-wrapper .menu-item:hover {
            cursor: pointer;
        }

        .container .menu-wrapper .menu-item:first-child {
        }

        .container .menu-wrapper ul li {
            width: auto;
        }

        .container .menu-wrapper ul li .menu-title-wrapper {
            display: block;
            width: 100%;
            font-size: 14px;
            color: #222;
            padding: 6px 0 0 0;
        }

        .container .menu-wrapper ul li .menu-title-wrapper:hover {
            color: #46CFB0;
        }

        .container .menu-wrapper ul li .menu-title-wrapper .menu-title-image {
            width: 36px;
            height: 36px;
            float: left;
            overflow: hidden;
            margin: 2px 0 0 0;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
        }

        .container .menu-wrapper ul li .menu-title-wrapper .menu-title-image img {
            width: 100%;
            height: 100%;
        }

        .container .menu-wrapper ul li .menu-title-wrapper .menu-title-chunk {
            width: 74px;
            height: 40px;
            overflow: hidden;
        }

        .container .menu-wrapper ul li .menu-title-wrapper .menu-title-chunk .menu-title-master {
            width: 100%;
            height: 24px;
            font-size: 16px;
            padding: 0 0 0 8px;
        }

        .container .menu-wrapper ul li .menu-title-wrapper .menu-title-chunk .menu-title-note {
            width: 100%;
            height: 16px;
            font-size: 10px;
            padding: 0 0 0 8px;
            color: gray;
        }

        .container .menu-wrapper .menu-child-wrapper {
            width: 120px;
            position: absolute;
            z-index: 1000;
            top: 100%;
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
            overflow: hidden;
        }

        .container .menu-wrapper .menu-child-wrapper li a {
            border: 0;
            width: 100%;
            height: 102%;
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
            height: 200px;
        }

        .container .content .top-wrapper .carousel-wrapper {
            float: left;
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

        .container .content .top-wrapper .priority-list-wrapper {
            width: 830px;
            height: 200px;
            float: left;
            overflow: hidden;
        }

        .container .content .top-wrapper .priority-list-wrapper .priority-list {
            height: 200px;
            width: 844px;
            margin-top: -8px;
            padding: 0 0 0 16px;
        }

        .container .content .top-wrapper .priority-list-wrapper .priority-list .priority-item {
            width: 206px;
            height: 108px;
            float: left;
            position: relative;
        }

        .container .content .top-wrapper .priority-list-wrapper .priority-list .priority-item div {
            width: 180px;
            height: 90px;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            overflow: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -45px;
            margin-left: -90px
        }

        .container .content .top-wrapper .priority-list-wrapper .priority-list .priority-item div:hover {
            cursor: pointer;
        }

        .container .content .top-wrapper .priority-list-wrapper .priority-list .priority-item div img {
            width: 180px;
            height: 90px;
        }

        .container .content .module-container .module-row {
            height: 380px;
            width: 100%;
            margin-top: 10px;
            overflow: hidden;
            clear: both;
        }

        .container .content .module-container .module-row .module-wrapper {
            height: 100%;
            width: 100%;
        }

        .container .content .module-container .module-row .module-left {
            height: 100%;
            width: 940px;
            float: left;
        }

        .container .content .module-container .module-row .module-left .module-header {
            height: 40px;
            width: 100%;
            float: left;
        }

        .container .content .module-container .module-row .module-left .module-header .module-title {
            height: 100%;
            width: 100px;
            float: left;
        }

        .container .content .module-container .module-row .module-left .module-header .module-title .module-title-i {
            width: 40px;
            height: 40px;
            display: block;
            float: left;
            background: url('https://web.bileji.com/assets/images/icons.png') no-repeat -141px -461px;;
        }

        .container .content .module-container .module-row .module-left .module-header .module-title .module-title-t {
            width: 60px;
            height: 100%;
            line-height: 40px;
            display: block;
            float: left;
            font-size: 24px;
            color: #222;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab {
            height: 100%;
            width: auto;
            float: left;
            padding: 0 5px;
            position: relative;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab li {
            width: 40px;
            cursor: pointer;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab .module-tab-item {
            height: 100%;
            float: left;
            line-height: 42px;
            margin: 0 10px;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab .module-tab-item:hover {
            color: orange;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab .module-tab-slider {
            height: 9px;
            position: absolute;
            bottom: 0;
            left: 15px;
            top: 24px;
            border-bottom: 2px solid lightblue;
            transition: all 0.2s;
            -moz-transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .container .content .module-container .module-row .module-left .module-header .module-tab .module-tab-slider span {
            display: block;
            margin: 0 auto;
            width: 0;
            height: 0;
            border: 4px solid white;
            border-bottom: 4px solid lightblue;
            position: relative;
            z-index: -10;
        }

        .container .content .module-container .module-row .module-right {
            height: 100%;
            width: 280px;
            margin-left: 10px;
            float: right;
        }

        .container .content .module-container .module-row .module-right .module-header {
            height: 40px;
            width: 100%;
            float: left;
        }

        .container .content .module-container .module-row .module-right .module-header .module-title {
            height: 100%;
            width: 55px;
            float: left;
        }

        .container .content .module-container .module-row .module-right .module-header .module-title .module-title-t {
            width: 55px;
            height: 100%;
            line-height: 40px;
            display: block;
            float: left;
            font-size: 24px;
            color: #222;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab {
            height: 100%;
            width: auto;
            float: left;
            padding: 0 5px;
            position: relative;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab li {
            width: 40px;
            cursor: pointer;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab .module-tab-item {
            height: 100%;
            float: left;
            line-height: 42px;
            margin: 0 10px;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab .module-tab-item:hover {
            color: orange;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab .module-tab-slider {
            height: 9px;
            position: absolute;
            bottom: 0;
            left: 15px;
            top: 24px;
            border-bottom: 2px solid lightblue;
            transition: all 0.2s;
            -moz-transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .container .content .module-container .module-row .module-right .module-header .module-tab .module-tab-slider span {
            display: block;
            margin: 0 auto;
            width: 0;
            height: 0;
            border: 4px solid white;
            border-bottom: 4px solid lightblue;
            position: relative;
            z-index: -10;
        }
    </style>

    <script type="text/javascript">
        // 顶部下拉
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
            // 关闭顶部下拉
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

            // 菜单栏
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

            // 模块tab
            $(".module-tab-item").click(function () {
                var left = parseInt($(this).css('marginLeft')) + parseInt($(this).parent().css('padding-left')) + $(this).index() * ($(this).width() + parseInt($(this).css('marginLeft')) + parseInt($(this).css('marginRight')));
                $(this).parent().find(".module-tab-slider").css({left: left});
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
                    <div class="menu-title-wrapper">
                        <div class="menu-title-image">
                            <img src="{{ asset('assets/images/menu_pic.jpg') }}">
                        </div>
                        <div class="menu-title-chunk">
                            <div class="menu-title-master">
                                中国菜谱
                            </div>
                            <div class="menu-title-note">
                                八大菜系
                            </div>
                        </div>
                        <div class="menu-title-row"></div>
                    </div>
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
                    <div class="menu-title-wrapper">
                        <div class="menu-title-image">
                            <img src="{{ asset('assets/images/menu_pic.jpg') }}">
                        </div>
                        <div class="menu-title-chunk">
                            <div class="menu-title-master">
                                外国料理
                            </div>
                            <div class="menu-title-note">
                                八大菜系
                            </div>
                        </div>
                        <div class="menu-title-row"></div>
                    </div>
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
                    <div class="menu-title-wrapper">
                        <div class="menu-title-image">
                            <img src="{{ asset('assets/images/menu_pic.jpg') }}">
                        </div>
                        <div class="menu-title-chunk">
                            <div class="menu-title-master">
                                西式糕点
                            </div>
                            <div class="menu-title-note">
                                八大菜系
                            </div>
                        </div>
                        <div class="menu-title-row"></div>
                    </div>
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
                    <div class="menu-title-wrapper">
                        <div class="menu-title-image">
                            <img src="{{ asset('assets/images/menu_pic.jpg') }}">
                        </div>
                        <div class="menu-title-chunk">
                            <div class="menu-title-master">
                                特色小吃
                            </div>
                            <div class="menu-title-note">
                                八大菜系
                            </div>
                        </div>
                        <div class="menu-title-row"></div>
                    </div>
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
                    <div class="menu-title-wrapper">
                        <div class="menu-title-image">
                            <img src="{{ asset('assets/images/menu_pic.jpg') }}">
                        </div>
                        <div class="menu-title-chunk">
                            <div class="menu-title-master">
                                黑暗料理
                            </div>
                            <div class="menu-title-note">
                                八大菜系
                            </div>
                        </div>
                        <div class="menu-title-row"></div>
                    </div>
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
                <li class="slider"></li>
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

                <div class="priority-list-wrapper">
                    <ul class="priority-list">
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                        <li class="priority-item">
                            <div><img src="{{ asset('assets/images/exc.jpg') }}"></div>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="module-container">
                <div class="module-row fillet">
                    <div class="module-wrapper">
                        <div class="module-left fillet">
                            <div class="module-header">
                                <div class="module-title">
                                    <span class="module-title-i fillet"></span>
                                    <span class="module-title-t">厨神</span>
                                </div>
                                <ul class="module-tab">
                                    <li class="module-tab-item">选项1</li>
                                    <li class="module-tab-item">选项2</li>
                                    <li class="module-tab-item">选项3</li>
                                    <li class="module-tab-slider">
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                            <ul class="module-body">

                            </ul>
                        </div>
                        <div class="module-right fillet">
                            <div class="module-header">
                                <div class="module-title">
                                    <span class="module-title-t">排行</span>
                                </div>
                                <ul class="module-tab">
                                    <li class="module-tab-item">选项1</li>
                                    <li class="module-tab-item">选项2</li>
                                    <li class="module-tab-slider">
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                            <ul class="module-body">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="module-row fillet">
                    <div class="module-wrapper">
                        <div class="module-left fillet">

                        </div>
                        <div class="module-right fillet">

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer></footer>
@stop