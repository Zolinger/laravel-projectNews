@extends('layouts.main')
@section('content')
<div class="row mb-2">
@forelse($news as $n)
  <div class="col-md-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
        <h3 class="mb-0" ><a href="{{ route('news.show', ['id' => $n['id']])}}">{{ $n['title'] }}</a></h3>
        <div class="mb-1 text-muted"><strong>{{ $n['author'] }}</strong>{{ $n['created_at']}}</div>
        <p class="card-text mb-auto">{!! $n['description'] !!}</p>
        <a style="text-decoration: none" href="{{ route('news.show', ['id' => $n['id']])}}">Подробнее</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      </div>
    </div>
  </div>
@empty
    <h2>Новостей нет</h2>
@endforelse
</div>
@endsection