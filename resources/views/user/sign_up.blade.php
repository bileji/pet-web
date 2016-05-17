@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <script src="{{'http://libs.baidu.com/jquery/1.9.0/jquery.js'}}"></script>
    <script src="{{'http://static.geetest.com/static/tools/gt.js'}}"></script>
    <style type="text/css">
        header, .container {
            min-width: 740px;
        }

        .nav-banner {
            height: 32px;
            width: 55%;
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

        .content .sign-up-body {
            width: 300px;
            margin: 30px auto;
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
    </style>
@stop

@section('container')
    <header>
        <div class="nav-banner">
            <ul class="nav-left">
                <li>
                    <div>
                        <a href="{{url('/')}}">返回首页</a>
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
                <div class="progress fine">
                    <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: 0;"></div>
                </div>
            </div>

            <div ng-controller="sign_up" class="sign-up-body">
                <div>
                    <div>
                        <input type="text" class="form-control" required ng-model="placeholder.phone">
                    </div>

                    <div class="verify">
                        <div id="div_geetest_lib">
                            <div id="captcha" class="captcha">
                                <script src="http://api.geetest.com/get.php?gt=4f80a638af7e2350b04b7d2ce0508386" async></script>
                            </div>
                            <script>
                                var handler = function (captchaObj) {
                                    var captcha = $("#captcha").children("div"), check_phone = $('#check-phone'), progress_bar = $("#progress-bar");
                                    captcha.css({"position": "absolute", "z-index": -9999});
                                    captchaObj.appendTo("#captcha");
                                    captcha.first().fadeOut(1000);

                                    // 验证成功
                                    captchaObj.onSuccess(function () {
                                        // todo 判断是否输入正确的手机号
                                        // 更新进度条
                                        progress_bar.css({"width": "20%"});
                                        // 打开下一步
                                        check_phone.removeClass("disabled");
                                    });

                                    check_phone.click(function (event) {
                                        var validate = captchaObj.getValidate();
                                        if (!validate) {
                                            alert('请先完成验证！');
                                            return;
                                        }
                                        $.ajax({
                                            url: "{{asset('verify/captcha')}}",
                                            type: "post",
                                            dataType: "json",
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {
                                                geetest_challenge: validate.geetest_challenge,
                                                geetest_validate: validate.geetest_validate,
                                                geetest_seccode: validate.geetest_seccode
                                            },
                                            success: function (result) {
                                                if (result == "success") {
                                                    $(document.body).html('<h1>发送手机验证码成功</h1>');
                                                } else {
                                                    $(document.body).html('<h1>发送手机验证码失败</h1>');
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
                        </div>
                    </div>

                    <div>
                        <button id="check-phone" type="button" class="btn btn-success more-long disabled">下一步</button>
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
                </div>
            </div>

        </div>
    </div>
@stop