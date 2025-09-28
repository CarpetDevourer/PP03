<header>
    <nav class="header-nav">
        <img class="header-logo" src="{{ asset('images/adminLogo.png') }}" alt="Логотип архива">
        <div class="header-brand">
            <a href="{{ url('/dashboard') }}" class="header-title">Архивный отдел администрации ГО Нефтекамск</a>
        </div>

        <div class="nav-list">
            <a class="nav-button" href="{{ url('/dashboard') }}">Все дела</a>
            <a class="nav-button" href="{{ route('main') }}">Внести дело</a>
            <a class="nav-button" href="#" id="theme">Сменить тему</a>
            <a class="nav-button" href="{{ url('/login') }}">Выйти</a>
        </div>
    </nav>
</header>
