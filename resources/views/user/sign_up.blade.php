@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <script src="{{'http://libs.baidu.com/jquery/1.9.0/jquery.js'}}"></script>
    <script src="{{'http://static.geetest.com/static/tools/gt.js'}}"></script>
    <style type="text/css">
        header, .container {
            padding: 0;
            min-width: 1230px;
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

        .content {
            padding: 140px 0;
            min-width: 700px;
        }

        .content .sign-up-header {
            width: 55%;
            height: 30px;
            margin: 0 auto;
        }

        .content .sign-up-header .progress-title {
            width: 100%;
            height: 20px;
        }

        .content .sign-up-header .progress-title .step {
            position: relative;
            top: -1px;
            background-color: #ADADAD;
        }

        .content .sign-up-header .progress-title div {
            width: 33.3%;
            min-width: 140px;
            float: left;
        }

        .content .sign-up-header .fine {
            height: 8px;
            width: 100%;
            margin: 5px 0;
        }

        .content .sign-up-header .progress-bar-dot .dot {
            top: -16px;
            left: 30%;
            width: 14px;
            height: 14px;
            border-radius: 7px;
            position: relative;
        }

        .content .sign-up-body {
            width: 300px;
            margin: 30px auto;
        }

        .content .sign-up-body .alter {
            width: 300px;
            text-align: left;
            position: absolute;
        }

        .content .sign-up-body .alter-first {
            top: 4px;
            left: 300px;
        }

        .content .sign-up-body .alter-second {
            top: 45px;
            left: 300px;
        }

        .content .sign-up-body .alter-third {
            top: 86px;
            left: 300px;
        }

        .content .sign-up-body .alter-fourth {
            top: 127px;
            left: 300px;
        }

        .content .sign-up-body .alter span {
            color: red;
            padding: 5px 0 0 5px;
        }

        .content .sign-up-body .alter .x {
            top: 2px;
        }

        .content .sign-up-body .verify {
            margin: 20px 2px;
        }

        .content .sign-up-body .verify .captcha {
            height: 28px;
            position: relative;
        }
        
        .content .sign-up-body .more-long {
            width: 100%;
            outline: none;
        }

        .content .sign-up-body .protocol {
            margin-top: 20px;
            font-size: 10px;
            text-align: left;
        }

        .content .sign-up-body .protocol a {
            color: #337ab7;
            text-decoration: underline;
        }

        .content .sign-up-body .table-space {
            margin: 8px 0;
            height: 34px;
        }

        .content .sign-up-body .verify-code {
            width: 195px;
            float: left;
        }

        .content .sign-up-body .verify-btn {
            width: 100px;
            float: right;
        }
    </style>
@stop

@section('container')
    <header>
        <div class="nav-banner">
            <ul class="nav-left">
                <li>
                    <div>
                        <a href="{{url('/')}}">
                            <span class="glyphicon glyphicon-home x"></span> 返回首页
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="container">
        <div class="content"  ng-app="user">
            <div class="sign-up-header">
                <div class="progress-title">
                    <div>
                        <a><span class="badge step">1</span> 验证手机号</a>
                    </div>
                    <div>
                        <a><span class="badge step">2</span> 填写账号信息</a>
                    </div>
                    <div>
                        <a><span class="badge step">3</span> 注册成功</a>
                    </div>
                </div>
                <div>
                    <div class="progress fine">
                        <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: 0;"></div>
                    </div>
                    <div class="progress-bar-dot">
                        <div class="progress fine dot" id="dot">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: 0;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div ng-controller="sign_up" class="sign-up-body">
                <form name="step1" id="step1" class="relative">
                    <div>
                        <input type="text" class="form-control" placeholder="手机号或邮箱" name="ID" username="ID" ng-model="user.ID" id="ID" wrong="@{{ step1.ID.$error.wrong || step1.ID.$error.required }}" required>
                    </div>
                    <div class="alter alter-first">
                        <span ng-show="!step1.ID.$error.required && step1.ID.$error.wrong" class="hide">
                            <span class="glyphicon glyphicon-remove x"></span> 请填写正确的手机号或邮箱
                        </span>
                    </div>

                    <div class="verify">
                        <div id="div_geetest_lib">
                            <div id="captcha" class="captcha">
                                <script src="http://api.geetest.com/get.php?gt=4f80a638af7e2350b04b7d2ce0508386" async></script>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button id="check-phone" type="button" class="btn btn-success more-long">下一步</button>
                    </div>

                    <div class="protocol">
                        <p>
                            注册意味着你同意
                            <a class="legal-link" target="_blank">服务条款</a>
                            与
                            <a class="legal-link" target="_blank">隐私政策</a>
                            ，包括
                            <a class="legal-link" target="_blank">Cookie 使用条款</a>
                            。其他用户将可以通过你所提供的邮件地址或手机号码找到你。
                        </p>
                    </div>
                </form>

                <form name="step2" id="step2" class="relative hide">
                    <div class="table-space">
                        <input type="text" class="form-control" placeholder="您的昵称(4-16位)" name="nickname" nickname="nickname" ng-model="user.nickname" nickname-wrong="@{{ step2.nickname.$error.wrong || step2.nickname.$error.required }}" required>
                    </div>
                    <div class="alter alter-first">
                        <span ng-show="!step2.nickname.$error.required && step2.nickname.$error.wrong" class="hide">
                            <span class="glyphicon glyphicon-remove x"></span> 支持字母、数字、汉字、"-"、"_"的组合
                        </span>
                        <span ng-show="!step2.nickname.$error.required && step2.nickname.$error.less" class="hide">
                            <span class="glyphicon glyphicon-remove x"></span> 昵称太简短了
                        </span>
                        <span ng-show="!step2.nickname.$error.required && step2.nickname.$error.more" class="hide">
                            <span class="glyphicon glyphicon-remove x"></span> 昵称字数太多了
                        </span>
                    </div>

                    <div class="table-space">
                        <input type="password" class="form-control" placeholder="设置密码(6-16位)" name="password" password="password" ng-model="user.password" required>
                    </div>
                    <div class="alter alter-second">
                        <span ng-show="!step2.password.$error.required && step2.password.$error.less">
                            <span class="glyphicon glyphicon-remove x"></span> 你的密码必须至少包含六个字符
                        </span>
                        <span ng-show="!step2.password.$error.required && step2.password.$error.more">
                            <span class="glyphicon glyphicon-remove x"></span> 密码位数过长
                        </span>
                        <span ng-show="!step2.password.$error.required && step2.password.$error.easy">
                            <span class="glyphicon glyphicon-remove x"></span> 密码太过简单
                        </span>
                    </div>

                    <div class="table-space">
                        <input type="text" class="form-control verify-code" placeholder="短信/邮件验证码" required>
                        <button id="resend" type="button" class="btn btn-success verify-btn" ng-click="send_verify()">发送验证码</button>
                    </div>
                    <div class="alter alter-fourth">
                        <span ng-show="">
                            <span class="glyphicon glyphicon-remove x"></span> 验证码格式错误
                        </span>
                    </div>

                    <div class="table-space">
                        <button id="user-sign-up" type="button" class="btn btn-success more-long">下一步</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 移除alert的隐藏
        $(".alter").children('span').removeClass("hide");

        var handler = function (captchaObj) {
            var step1 = $("#step1"), step2 = $("#step2"), step3 = $("#step3"), dot = $("#dot"), ID = $("#ID"), captcha = $("#captcha").children("div"), check_phone = $('#check-phone'), progress_bar = $("#progress-bar");

            var check_phone_html = check_phone.html();

            var shake = function (object) {
                var times = 4, range = 3;
                object.html("请完成验证").css({"position": "relative"});
                for (var time = times; time >= 0 ; time--) {
                    object.animate({"left": time * range}, 30);
                    object.animate({"left": - time * range}, 30);
                }
            };

            captcha.css({"position": "absolute", "z-index": -9999}).first().fadeOut(200);

            captchaObj.appendTo("#captcha");

            // 验证成功
            captchaObj.onSuccess(function () {
                check_phone.html(check_phone_html);
                progress_bar.css({"width": "31%"});
            });

            check_phone.click(function () {
                var validate = captchaObj.getValidate();
                if (!validate || ID.attr("wrong") != "true") {
                    shake(check_phone);
                    return;
                }
                $.ajax({
                    url: "{{asset('verify/captcha')}}",
                    type: "post",
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        geetest_seccode: validate.geetest_seccode,
                        geetest_validate: validate.geetest_validate,
                        geetest_challenge: validate.geetest_challenge
                    },
                    success: function (object) {
                        if (object.status == 0) {
                            dot.animate({"left": "70%"}, 1500);
                            step1.addClass("hide");
                            step2.removeClass("hide");
                        } else {
                            console.log('todo');
                        }
                    }
                });
            });
        };
        $.ajax({
            url: "{{asset("verify/captcha?rand=")}}" + Math.round(Math.random() * 100),
            type: "get",
            dataType: "json",
            success: function (data) {
                initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    product: "float",
                    offline: !data.success
                }, handler);
            }
        });
    </script>
@stop