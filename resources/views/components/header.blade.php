<header class="blog-header lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">"Новостя!" - Портал актуальных новостей</a>
    </div>
    <div class="col-4 d-flex justify-content-between align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.feedback.create')}}">Обратная связь</a>
        <div class="row flex-nowrap justify-content-between align-items-center">
            @if (Route::has('login'))
          <div class="col-4 d-flex justify-content-between align-items-center">
              @auth
                  <a class="btn btn-sm btn-outline-secondary" href="{{ url('/home') }}" >На главную</a>
              @else
                  <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}" >Вход</a>
      
                  @if (Route::has('register'))
                      <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}" >Регистрация</a>
                  @endif
              @endauth
          </div>
      @endif
          </div>
    </div>
    </div>
</header>