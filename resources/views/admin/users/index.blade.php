@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Статус (1-админ; 0-не админ)</th>
                    <th>Заголовок</th>
                    <th>Имя пользователя</th>
                    <th>Эл. почта</th>
                    <th>Дата регистрации</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usersList as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->is_admin }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->created_at }}</td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $users]) }}">Изм.</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Записей нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
