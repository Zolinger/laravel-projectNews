<nav style="margin: 10px 350px" id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div  class="position-sticky pt-3 sidebar-sticky">
      <ul>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('account')) active @endif" href="{{ route('account')}}">
            Личный кабинет
          </a>
        </li>
        @if(Auth::user()->is_admin === true)
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index')}}">
            В админку
          </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>