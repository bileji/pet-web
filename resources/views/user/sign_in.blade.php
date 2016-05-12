@extends('layouts.master')

@section('title', '比乐集-账号登录')

@section('modules')
    <script src="{{asset('assets/scripts/modules/user/controller.js')}}"></script>
@stop

@section('container')
    @include('layouts.header')




    @include('layouts.footer')
@stop