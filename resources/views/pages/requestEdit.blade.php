@extends('index')
@section('title', 'Обработка заявки #' . $request->id)
@section('content')
    <section>
        <div class="formContainer">
            <h1>Обработка заявки #{{ $request->id }}</h1>

            <form method="POST" action="{{ route('archivedelo.update', $request->id) }}" class="salary-processing-form">
                @csrf
                @method('PUT')

                <div class="formSection">
                    <h3>Информация от заявителя</h3>
                    <div class="view-only-data">
                        <div class="dataRow">
                            <label>ФИО:</label>
                            <span>{{ $request->full_name }}</span>
                        </div>
                        <div class="dataRow">
                            <label>Телефон:</label>
                            <span>{{ $request->phone }}</span>
                        </div>
                        <div class="dataRow">
                            <label>Email:</label>
                            <span>{{ $request->email }}</span>
                        </div>
                        <div class="dataRow">
                            <label>Организация:</label>
                            <span>{{ $request->organization }}</span>
                        </div>
                        <div class="dataRow">
                            <label>Период работы:</label>
                            <span>
                                {{ \Carbon\Carbon::parse($request->start_date)->format('m.Y') }} -
                                {{ \Carbon\Carbon::parse($request->end_date)->format('m.Y') }}
                            </span>
                        </div>
                        <div class="dataRow">
                            <label>Цель запроса:</label>
                            <span>
                                @switch($request->purpose)
                                    @case('pension') Для оформления пенсии @break
                                    @case('employment') Для трудоустройства @break
                                    @case('court') Для суда @break
                                    @case('other') Иное @break
                                @endswitch
                            </span>
                        </div>
                        @if($request->comment)
                            <div class="dataRow">
                                <label>Комментарий заявителя:</label>
                                <span>{{ $request->comment }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="formSection">
                    <h3>Заполнение архивных данных</h3>
                    <div class="form-grid">
                        <div class="formGroup">
                            <label>Должность *</label>
                            <input type="text" name="position" value="{{ $request->position ?? '' }}" required>
                        </div>
                        <div class="formGroup">
                            <label>Статус заявки *</label>
                            <select name="status" required>
                                <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>Новая</option>
                                <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                                <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Завершена</option>
                            </select>
                        </div>
                    </div>

                    <div class="formGroup">
                        <label>Данные о заработной плате за указанный период *</label>
                        <textarea name="salary_data" rows="8" required placeholder="Введите данные о заработной плате по годам/месяцам:

Пример:
2020 год:
- Январь: 45,000 руб.
- Февраль: 45,000 руб.
- Март: 47,500 руб.

2021 год:
- Январь: 48,000 руб.
- Февраль: 48,000 руб.
- Март: 50,000 руб.">{{ $request->salary_data ?? '' }}</textarea>
                    </div>

                    <div class="formGroup">
                        <label>Комментарий архивариуса</label>
                        <textarea name="archivist_comment" rows="4" placeholder="Дополнительная информация...">{{ $request->archivist_comment ?? '' }}</textarea>
                    </div>
                </div>

                <div class="formActions">
                    <button type="submit" class="btn-primary">Сохранить изменения</button>
                    <a href="{{ route('dashboard') }}" class="btn-secondary">Вернуться к списку</a>
                </div>
            </form>
        </div>
    </section>

@endsection
