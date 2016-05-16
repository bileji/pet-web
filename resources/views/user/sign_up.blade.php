@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <script src="{{'http://libs.baidu.com/jquery/1.9.0/jquery.js'}}"></script>
    <script src="{{'http://static.geetest.com/static/tools/gt.js'}}"></script>
    <style type="text/css">
        .content {
            padding: 140px 50px;
        }

        .content .sign-up-header {
            padding: 0 205px;
        }

        .content .sign-up-header .progress-title {
            width: 100%;
            height: 20px;
        }

        .content .sign-up-header .progress-title div {
            width: 33.3%;
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
        
        .content .sign-up-body .more-long {
            width: 100%;
        }
    </style>
@stop

@section('container')
    <div class="container">
        <div class="content"  ng-app="user">
            <div class="sign-up-header">
                <div class="progress-title">
                    <div>
                        <a>验证手机号</a>
                    </div>
                    <div>
                        <a>填写账号信息</a>
                    </div>
                    <div>
                        <a>注册成功</a>
                    </div>
                </div>
                <div class="progress fine">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width: 33.3%"></div>
                </div>
            </div>

            <div ng-controller="sign_up" class="sign-up-body">
                <form>
                    <div>
                        <input type="text" class="form-control" required ng-model="placeholder.phone">
                    </div>

                    <div class="verify">
                        <div id="div_geetest_lib">
                            <div id="captcha"></div>
                            <script src="http://api.geetest.com/get.php?gt=421b84eeaee7b2aed4c0ec5706d8b571" async></script>
                            <script>
                                var handler = function (captchaObj) {
                                    captchaObj.appendTo("#captcha");
                                    $('#check-phone').click(function () {
                                        var validate = captchaObj.getValidate();
                                        if (!validate) {
                                            alert('请先完成验证！');
                                            return;
                                        }
                                        $.ajax({
                                            url: "{{asset('verify/captcha')}}", // 进行二次验证
                                            type: "post",
                                            dataType: "json",
                                            data: {
                                                // 二次验证所需的三个值
                                                geetest_challenge: validate.geetest_challenge,
                                                geetest_validate: validate.geetest_validate,
                                                geetest_seccode: validate.geetest_seccode
                                            },
                                            success: function (result) {
                                                if (result == "Yes!") {
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
                        <button id="check-phone" type="button" class="btn btn-success more-long">下一步</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop