@extends('layouts.master')

@section('title', '注册-比乐集')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
    <style type="text/css">

    </style>
@stop

@section('container')
    <div class="container">
        <div class="content">
            <h1>Sign up</h1>
            <form>
                <div>
                    <input type="text" class="form-control" required>
                    <div [hidden]="name.valid || name.pristine" class="alert alert-danger">
                        Name is required
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop