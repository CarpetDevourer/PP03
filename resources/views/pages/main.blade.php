@extends('index')
@section('title', 'Подача заявки в архив')
@section('content')
    <section>
        <div class="formContainer">
            <h1>Добавление дела в архив</h1>
            <p>Заполните форму для внесения дела в архив</p>

            <form class="requestForm" method="POST" action="{{ route('archiveDelo.store') }}">
                @csrf
                <div class="formSection">
                    <h3>Сведения о лице</h3>
                    <div class="formGrid">
                        <div class="formGroup">
                            <label>ФИО полностью *</label>
                            <input type="text" name="full_name" required placeholder="Иванов Иван Иванович">
                        </div>
                        <div class="formGroup">
                            <label>Контактный телефон *</label>
                            <input type="tel" name="phone" required placeholder="+7 (900) 123-45-67">
                        </div>
                        <div class="formGroup">
                            <label>Email *</label>
                            <input type="email" name="email" required placeholder="ivanov@example.com">
                        </div>
                    </div>
                </div>

                <div class="formSection">
                    <h3>Информация о периоде работы</h3>
                    <div class="formGrid">
                        <div class="formGroup">
                            <label>Организация (где работал/ла) *</label>
                            <input type="text" name="organization" required placeholder="ООО 'Искож'">
                        </div>
                        <div class="formGroup">
                            <label>Должность *</label>
                            <input type="text" name="position" required placeholder="Разнорабочий персонал">
                        </div>
                        <div class="formGroup">
                            <label>Период работы с *</label>
                            <input type="date" name="start_date" required>
                        </div>
                        <div class="formGroup">
                            <label>Период работы по *</label>
                            <input type="date" name="end_date" required>
                        </div>
                    </div>
                </div>

                <div class="formSection">
                    <h3>Описание дела</h3>
                    <div class="formGroup">
                        <label>Комментарии</label>
                        <textarea name="comment" placeholder="Кто внёс дело. Уточните детали, если необходимо"></textarea>
                    </div>
                </div>

                <div class="formActions">
                    <button type="submit" class="btn-primary">Внести дело</button>
                </div>
            </form>
        </div>
    </section>
@endsection
