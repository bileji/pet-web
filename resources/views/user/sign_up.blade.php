@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <style type="text/css">

    </style>
@stop

@section('container')
    <div class="container">
        <div class="content"  ng-app="user">
            <h1>Sign up</h1>
            <form ng-controller="sign_up">
                <div>
                    <input type="text" class="form-control" required ng-model="placeholder.nickname">
                    <div [hidden]="name.valid || name.pristine" class="alert alert-danger">
                        Name is required
                    </div>
                </div>

                <div>
                    <input type="number" class="form-control" required ng-model="placeholder.phone">
                </div>

                <div>
                    <input type="number" class="form-control" required ng-model="placeholder.verify">
                </div>
            </form>
        </div>
    </div>
@stop