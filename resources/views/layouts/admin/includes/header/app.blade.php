<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="{{request()->route()->getName() == 'admin.home' ? 'navbar-brand text-info' : 'navbar-brand' }}" href="{{ route('admin.home')}}">Админ Панель</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

              <a class="{{ request()->route()->getName() == 'admin.users' ? 'nav-link text-info' : 'nav-link' }}" href="{{ route('admin.users') }}">Пользователи ({{ $countOfUsers }})</a>
            </li>
            <li class="nav-item active">
              <a class="{{request()->route()->getName() == 'admin.dictations' ? 'nav-link text-info' : 'nav-link' }}" href="{{ route('admin.dictations') }}">Диктанты ({{ $countOfDictation }})</span></a>
            </li>
            <li class="nav-item active">
              <a class="{{request()->route()->getName() == 'admin.dictation_results' ? 'nav-link text-info' : 'nav-link' }}" href="{{ route('admin.dictation_results') }}">Результаты Диктантов ({{ $countOfDictationResults }})</a>
            </li>
          </ul>
        @guest
        <a class="btn btn-outline-primary mr-2" href="{{ route('login') }}">{{ __('Войти') }}</a>
        <a class="btn btn-outline-primary mr-2" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
        @else
        <a href="{{ route('profile.page') }}">
        <span class='mr-4 text-white'">
            {{ auth()->user()->name }} <span class="caret"></span>
            <img class="header-profile-image" src="{{ asset('/storage/'.auth()->user()->image) }}" ></span>
        </span>
        </a>

        <a class="btn btn-outline-primary mr-4" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Выйти') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
        </div>
      </nav>
@yield("content")