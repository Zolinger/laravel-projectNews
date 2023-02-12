@extends('layouts.app')
@section('title') Личный кабинет @parent @stop
@section('content')
    <div style="margin: 10px 350px" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Личный кабинет</h1>
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
    </div>
    <x-account.sidebar></x-account.sidebar>
@endsection