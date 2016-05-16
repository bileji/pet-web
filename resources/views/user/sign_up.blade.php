@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <style type="text/css">
        .content {
            padding: 140px 300px;
        }

        .container form div {
            padding: 10px 100px;
        }
    </style>
@stop

@section('container')
    <div class="container">
        <div class="content"  ng-app="user">
            <div>
                加入比乐集
            </div>
            <form ng-controller="sign_up">
                <div>
                    <input type="text" class="form-control" required ng-model="placeholder.nickname">
                </div>

                <div>
                    <input type="text" class="form-control" required ng-model="placeholder.phone">
                </div>

                <div>
                    <div>
                        <input type="text" class="form-control" required ng-model="placeholder.verify">
                    </div>
                    <div>
                        图形验证码
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop