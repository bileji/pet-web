@extends('layouts.master')

@section('title', '比乐集-账号登录')

@section('modules')
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