@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="http://api.geetest.com/get.php"></script>
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

        .container form div {
            padding: 10px 100px;
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

            <div ng-controller="sign_up">
                <form>
                    <div>
                        <input type="text" class="form-control" required ng-model="placeholder.phone">
                    </div>

                    <div class="box" id="div_geetest_lib">
                        <div id="captcha"></div>
                        <script src="http://static.geetest.com/static/tools/gt.js"></script>
                        <script>
                            var handler = function (captchaObj) {
                                // 将验证码加到id为captcha的元素里
                                captchaObj.appendTo("#captcha");
                            };
                            $.ajax({
                                // 获取id，challenge，success（是否启用failback）
                                url: "{{asset("verify/captcha?rand=")}}" + Math.round(Math.random()*100),
                                type: "get",
                                dataType: "json",
                                success: function (data) {
                                    // 使用initGeetest接口
                                    // 参数1：配置参数，与创建Geetest实例时接受的参数一致
                                    // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                                    initGeetest({
                                        gt: data.gt,
                                        challenge: data.challenge,
                                        product: "float", // 产品形式
                                        offline: !data.success
                                    }, handler);
                                }
                            });
                        </script>
                    </div>
                    <button type="button" class="btn btn-success">下一步</button>
                </form>
            </div>

        </div>
    </div>
@stop