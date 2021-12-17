<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{mix('css/app.css')}}" rel="stylesheet">
        <script src="{{ mix('js/mainpage.js')}}"></script>
        <title>Admin/Backend Interface</title>
    </head>
    <body class="bg-gray-100 h-full">
    @include('Auth/Login')
    </body>
</html>