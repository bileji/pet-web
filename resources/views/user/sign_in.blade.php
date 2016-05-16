@extends('layouts.master')

@section('title', '比乐集-账号登录')

@section('modules')
    <link rel="stylesheet" href="{{asset('assets/styles/common/master.css')}}">
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
@stop

@section('container')
    @include('layouts.header')
    <div class="container">
        <div class="content">

        </div>
    </div>
    @include('layouts.footer')
@stop