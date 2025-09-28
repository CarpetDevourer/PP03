@extends('index')
@section('title', 'Панель управления')
@section('content')
    <section>

        <div class="dashboard-header">
            <h1>Панель управления архивом</h1>
            <p>Рабочее место архивариуса</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h3>Реестр дел. Всего дел:</h3>
                <p class="stat-number">{{ $totalRequests }}</p>
            </div>
        </div>

        <div class="section">
            <h2>Последние внесённые дела</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="filters">
                <input type="text" placeholder="Поиск по ФИО или организации..." class="search-input" id="searchInput">
                <select class="filter-select" id="statusFilter">
                <option value="">Все статусы</option>
                <option value="new">Новые</option>
                <option value="in_progress">В работе</option>
                <option value="completed">Завершённые</option>
                </select>
            </div>

            <table class="requests-table">
                <thead>

                <tr>
                <th>№ дела</th>
                <th>ФИО</th>
                <th>Организация</th>
                <th>Дата внесения</th>
                <th>Действия</th>
                </tr>

                </thead>

                <tbody>
                @foreach($requests as $request)
                    <tr class="request-row" data-status="{{ $request->status }}">
                    <td>#{{ $request->id }}</td>
                    <td>{{ $request->full_name }}</td>
                    <td>{{ $request->organization }}</td>
                    <td>{{ $request->created_at->format('d.m.Y H:i') }}</td>


                    <td>
                        <button class="btn-view" onclick="toggleDetails({{ $request->id }})">Просмотр</button>
                    </td>

                    </tr>
                    <tr class="details-row" id="details-{{ $request->id }}" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <h4>Детали дела #{{ $request->id }}</h4>
                                <div class="details-grid">
                                    <div class="detail-item">
                                        <strong>ФИО:</strong> {{ $request->full_name }}
                                    </div>
                                    <div class="detail-item">
                                        <strong>Телефон:</strong> {{ $request->phone }}
                                    </div>
                                    <div class="detail-item">
                                        <strong>Email:</strong> {{ $request->email }}
                                    </div>
                                    <div class="detail-item">
                                        <strong>Организация:</strong> {{ $request->organization }}
                                    </div>
                                    <div class="detail-item">
                                        <strong>Должность:</strong> {{ $request->position }}
                                    </div>
                                    <div class="detail-item">
                                        <strong>Период работы:</strong>
                                        {{ \Carbon\Carbon::parse($request->start_date)->format('m.Y') }} -
                                        {{ \Carbon\Carbon::parse($request->end_date)->format('m.Y') }}
                                    </div>

                                    @if($request->comment)
                                        <div class="detail-item full-width">
                                            <strong>Комментарий:</strong> {{ $request->comment }}
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>




    <script>
        function toggleDetails(requestId) {
            const detailsRow = document.getElementById('details-' + requestId);
            detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
        }
        document.getElementById('searchInput').addEventListener('input', filterRequests);
        document.getElementById('statusFilter').addEventListener('change', filterRequests);

        function filterRequests() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('.request-row');

            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const organization = row.cells[2].textContent.toLowerCase();
                const status = row.getAttribute('data-status');

                const matchesSearch = name.includes(searchText) || organization.includes(searchText);
                const matchesStatus = !statusFilter || status === statusFilter;

                row.style.display = matchesSearch && matchesStatus ? '' : 'none';
                const requestId = row.cells[0].textContent.replace('#', '');
                const detailsRow = document.getElementById('details-' + requestId);
                if (detailsRow) {
                    detailsRow.style.display = 'none';
                }
            });
        }
    </script>
@endsection
