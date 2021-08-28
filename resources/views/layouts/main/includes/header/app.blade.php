<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Project</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ url('/') }}">Главная</a>
        <a class="p-2 text-dark" href="{{ route('home') }}">Диктанты</a>

    </nav>
<!-- Authentication Links -->
@guest
    <a class="btn btn-outline-primary mr-2" href="{{ route('login') }}">{{ __('Войти') }}</a>
    @if (Route::has('register'))
    <a class="btn btn-outline-primary mr-2" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
    @endif

@else
        <a href="{{ route('profile.page') }}">
        <span class='mr-4 text-black'>
            {{ auth()->user()->name }} <span class="caret">
                <img class="ml-2 header-profile-image" src="{{ asset('/storage/'.auth()->user()->image) }}"></span>
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
