<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helpdesk Fatec Jaú</title>
    <link rel="stylesheet" href="{{ asset('assets/css/helpdeskBulma.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/clean.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css')}}">
</head>
<body id="app" class="has-background-light">
    <main id="app-content">
        @include('flash::message')
        @yield('content')
    </main>
</body>
</html>
