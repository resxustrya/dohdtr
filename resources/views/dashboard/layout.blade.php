<!doctype html>
<html>
<head>
    <title>@yield('title','Home - DOH')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/dashboard.css') }}?v=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/menu/css/sm-core-css.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/menu/css/sm-mint/sm-mint.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/menu/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/bootstrap/datepicer/css/bootstrap-datepicker3.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/bootstrap/datepicer/css/bootstrap-datepicker3.standalone.css') }}" />
    <script src="{{ asset('resources/assets/angular/angular.js')}}"></script>
    <script>
        var myApp = angular.module('myApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
    </script>
    <style>
    </style>
</head>
<body ng-app="myApp" class="ng-cloak">
@include('dashboard.header')
@include('dashboard.menu')
@yield('content')
@include('dashboard.footer')
<script src="{{ asset('resources/assets/js/jquery/jquery.js') }}"></script>
<script src="{{ asset('resources/assets/bootstrap/datepicer/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('resources/assets/menu/jquery.smartmenus.js') }}"></script>
<script src="{{ asset('resources/assets/menu/custom.js') }}"></script>
<script src="{{ asset('resources/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/script.js') }}"></script>
<script>
</script>
@section('js')
@show
</body>
</html>
