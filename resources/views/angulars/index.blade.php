@extends('layouts.master')

@section('title', 'Angular2')

@section('modules')
    <script src="{{asset('scripts/app/app.component.js')}}"></script>
    <script src="{{asset('scripts/app/main.js')}}"></script>
@stop

@section('container')
    <my-app>loading...</my-app>
@stop