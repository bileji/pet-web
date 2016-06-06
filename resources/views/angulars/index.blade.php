@extends('layouts.master')

@section('title', 'Angular2')

@section('modules')
    <script src="{{asset('assets/scripts/modules/angular/controller.js')}}"></script>
@stop

@section('container')
    <div ng-app="angular">
        <p>
            Nothing here 1 + 2 = @{{ 1 + 2 }}
        </p>
        <ul ng-controller="test">
            <li ng-repeat="user in data">@{{user.name}}</li>
        </ul>
    </div>
@stop