@extends('layouts.master')

@section('title', '比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <style rel="stylesheet">
        body {
            margin: 0;
            color: #888;
            font-family: 'Microsoft YaHei', tahoma, arial, 'Hiragino Sans GB', 宋体, sans-serif;
        }

        input[text], button {
            margin: 0;
            color: #888;
            font-family: Cambria, Georgia, sans-serif;
        }

        a {
            cursor: pointer;
        }

        .separator {
            width: 0;
            height: 14px;
            margin: 9px 4px;
            border-left: 1px solid #ccc;
            display: inline-block;
        }

        header {
            font-size: 12px;
            width: 100%;
            min-width: 1230px;
            position: relative;
            background-color: #e8e8e8;
        }

        .nav-pull {
            height: 80px;
            background-size: 100%;
            background-image: url('http://www.bileji.com/assets/images/banner_background.png');
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

        .nav-left li div a {
            color: #888;
        }

        .nav-left li div a:hover {
            color: orange;
            text-decoration: none;
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

        .nav-right li div a {
            color: #888;
        }

        .nav-right li div a:hover {
            color: orange;
            text-decoration: none;
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

        footer {
            font-size: 12px;
            width: 100%;
            height: 300px;
            min-width: 1230px;
            position: relative;
            background-color: orange;
        }
    </style>
@stop

@section('container')
    <header>
        <div class="nav-pull"></div>
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
                        <a>注册</a>
                    </div>
                </li>
                <li>
                    <div>
                        <a>登录</a>
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