@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
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

                    <script src="http://code.jquery.com/jquery-1.12.3.min.js"></script>
                    <script src="http://static.geetest.com/static/tools/gt.js"></script>
                    <div class="gt_slider">
                        <div class="gt_guide_tip gt_show">按住左边滑块，拖动完成上方拼图</div>
                        <div class="gt_slider_knob gt_show" style="transform: translate(0px, 0px); -webkit-transform: translate(0px, 0px);"></div><div class="gt_curtain_tip gt_hide">点击上图按钮并沿道路拖动到终点处</div>
                        <div class="gt_curtain_knob gt_hide">移动到此开始验证</div>
                        <div class="gt_ajax_tip ready"></div>
                    </div>
                    <button type="button" class="btn btn-success">下一步</button>
                </form>
            </div>

        </div>
    </div>
@stop