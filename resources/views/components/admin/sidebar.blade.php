<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index')}}">
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="#">
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index')}}">
            Раздел новостей
          </a>
          <ul>
            <li>
              <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.create')}}">
              Создать новость
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
            Редактировать новость
          </a>
        </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.feedback.*')) active @endif" href="{{ route('admin.feedback.index')}}">
            Отзывы
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.unloading.index')) active @endif" href="{{ route('admin.unloading.index')}}">
            Выгрузка данных
          </a>
        </li>
      </ul>
    </div>
  </nav>