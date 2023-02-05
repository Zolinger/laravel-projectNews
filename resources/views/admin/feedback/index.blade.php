@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список отзывов</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feedbackList as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->username }}</td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $feedbackList->links() }}
    </div>
@endsection
