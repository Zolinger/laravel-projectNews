@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Выгрузка данных</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
<div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    
    <form method="post" action="robots.txt">
       @csrf
       <div class="form-group">
           <label for="username">Заказчик</label>
           <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control">
       </div>
        <div class="form-group">
            <label for="number">Номер телефона</label>
            <input type="number" id="number" name="number" value="{{ old('number') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="mail">Электронная почта</label>
            <input type="mail" id="mail" name="mail" value="{{ old('mail') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>
@endsection