<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/tailwind.css') }}">
</head>
<body>
@yield('content')
<script type="text/javascript" src="{{ mix('/js/script.js') }}"></script>
</body>
</html>
