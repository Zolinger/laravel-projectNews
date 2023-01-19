@extends('layouts.main')
@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <article class="blog-post">
          <h2 class="blog-post-title mb-1">{{ $news['title']}}</h2>
          <p class="blog-post-meta">{{ $news['created_at']}} by {{ $news['author']}}</a></p>
          {!! $news['description']!!}  
        </article>

    </div>
    <a style="text-decoration: none" href="{{ route('news')}}">Вернуться назад</a>
    
</div>
@endsection
