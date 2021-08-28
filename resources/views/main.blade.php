@extends("layouts.main.app")

@section("title")
Главная Страница
@endsection

@section("content")
<!-- Main Authorize -->
@guest
<div class="container">
    <div class="p-5 text-center alert alert-info">
		<span>Пожалуйста <a href="{{ route('login') }}">Авторизуйтесь</a> или <a href="{{ route('register') }}">Зарегистрируйтесь</a> чтобы начать!</span>
	</div>
</div>
@else
<div class="container">
	<div class="p-5 text-center alert alert-primary">
		<span>Можете пройти <a href="{{ route('home') }}">диктант</a></span>
	</div>
</div>
@endguest
<!-- End Main -->
@endsection