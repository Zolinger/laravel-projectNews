@extends('layouts.feedback')
@section('title') Обратная связь @parent @stop
@section('content')
    <div class="d-flex; flex-direction: column; flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма обратной связи</h1>
        <br>
        <div>
            <form method="post" action="{{ route('admin.feedback.store') }}">
                @csrf
                 <div class="form-group">
                     <label for="username">Имя пользователя</label>
                     <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
                    </div>
                 <div class="form-group">
                     <label for="comment">Комментарий</label>
                     <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment">{{ old('comment') }}</textarea>
                 </div>
                 <br>
                 <button type="submit" class="btn btn-success">Отправить</button>
             </form>
        </div>
    </div>
    <a class="p-2 link-secondary" href="{{ route('news')}}">На главную</a>
@endsection