@extends("layouts.admin.includes.header.app")

@section("title")
Главная
@endsection
@include('layouts.admin.includes.head.app')

@section("content")
<div class="container">
  <div class="mt-5">
    {{ Breadcrumbs::render('admin.home') }}
  </div>
  <div class="row ml-4">
    <div class="col-3 card mr-4 ml-5 mt-5 p-3">
      <div class="card-body">
        <h5 class="card-title mt-4">Пользователи</h5>
        <p class="card-text">Получить информацию о пользователях на сайте</p>
        <a href="{{ route('admin.users') }}" class="btn btn-primary">Перейти</a>
      </div>
    </div>
    <div class="col-3 card mr-4 mt-5 w-25 p-3">
      <div class="card-body">
        <h5 class="card-title mt-4">Диктанты</h5>
        <p class="card-text">Получить информацию о диктантах на сайте
        </p>
        <a href="{{ route('admin.dictations') }}" class="btn btn-primary">Перейти</a>
      </div>
    </div>

    <div class="col-4 card mr-4 mt-5 w-25 p-3">
      <div class="card-body">
        <h5 class="card-title mt-4">Результаты Диктантов</h5>
        <p class="card-text">Получить информацию о результатах диктантов на сайте</p>
        <a href="{{ route('admin.dictation_results') }}" class="btn btn-primary">Перейти</a>
      </div>
    </div>
  </div>
</div>
@endsection