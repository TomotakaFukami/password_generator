<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"></script>
    </head>
    <body>
    <div id="app">
        <vue-header></vue-header>
        <router-view></router-view>
        </div>
        </body>
        <script src="{{ mix('js/app.js') }}"></script>
</html>
