<!doctype html>
<html lang="ru" theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Архив ГО Нефтекамск | @yield('title', 'Главная')</title>
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeButton = document.getElementById('theme');
        if (themeButton) {
            themeButton.addEventListener('click', function(e) {
                e.preventDefault();
                const html = document.documentElement;
                const currentTheme = html.getAttribute('theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                html.setAttribute('theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });
        }

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.documentElement.setAttribute('theme', savedTheme);
        }
    });
</script>
</body>
</html>
