@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <style type="text/css">
        .content {
            padding: 140px 50px;
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
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width: 33.3%">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
            </div>
            <form ng-controller="sign_up">
                <div>
                    <input type="text" class="form-control" required ng-model="placeholder.nickname">
                </div>

                <div>
                    <input type="text" class="form-control" required ng-model="placeholder.phone">
                </div>

                <div class="verify">
                    <div class="">
                        <input type="text" class="form-control" required ng-model="placeholder.verify">
                    </div>
                    <div class="image">
                        图形验证码
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop