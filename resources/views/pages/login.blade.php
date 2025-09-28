@vite('resources/css/app.css')

<div class="login-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Вход только для сотрудников</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="login">Логин</label>
            <input
                type="text"
                name="login"
                id="login"
                class="form-control"
                placeholder="Ваш login"
                value="{{ old('email') }}"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Ваш пароль"
                required
            >
        </div>

        <button type="submit" class="btn">Войти</button>
    </form>
</div>

