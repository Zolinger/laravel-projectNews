<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index')}}">
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('account')) active @endif" href="{{ route('account')}}">
            Личный кабинет
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index')}}">
            Раздел категорий
          </a>
          <ul>
            <li>
              <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.create')}}">
              Создать категорию
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
            Редактировать категории
          </a>
        </li>
          </ul>
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
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index')}}">
            Раздел пользователи
          <ul>
            <li class="nav-item">
              <a class="nav-link @if(request()->routeIs('admin.users.index')) active @endif" href="{{ route('admin.users.index')}}">
                Пользователи
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                Редактор пользователей
              </a>
            </li>
          </ul>
        </li>
      
    </div>
  </nav>