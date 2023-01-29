@extends('layouts.main')
@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <article class="blog-post">
          <h2 class="blog-post-title mb-1">{{ $category['title'] }}</h2>  
        </article>
    </div>
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;"></div>
      </div>
    </div>
@endsection
