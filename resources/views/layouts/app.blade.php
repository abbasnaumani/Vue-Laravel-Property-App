<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KS RealEstate') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/ks-logo.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('assets/images/ks-logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/ks-logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/oneui.css') }}" >
</head>
<body class="font-sans antialiased">
<div id="app">
</div>

<script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>
<script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

<script src="{{ asset('js/main/app.js') }}" type="text/javascript"></script>
</body>
</html>
