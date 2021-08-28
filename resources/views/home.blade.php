@extends('layouts.main.app')

@section("title")
Страница Сдачи
@endsection

@section('content')
<!-- Main content -->
@if ($already)
<div class="container">
    <div class="p-5 text-center alert alert-warning">
        Вы уже сдали этот диктант
    </div>
</div>
@else
@if ($dictation)
<div class="container">
    <div class="row">
        <div class="col-6 md-8">
            <div class="card">
                <div class="card-header">
                    Название диктанта: {{ $dictation->title }}
                </div>
                <div class="card-body">
                    <form action="{{ route('check') }}" method="post">
                        @csrf
                        <input type="hidden" name='data' value='{{ $dictation->id }}' id='data'>
                        <textarea id='textarea-change' class="dictation-input form-control" name="text" placeholder="Print text here" cols="30" rows="10"></textarea>
                        <button id="textarea-delete" type="submit" class='btn btn-danger dictation-btn'>Сохранить Результат</button>
                    </form>
                </div>
            </div>
        </div>
        <iframe width="500" height="300" src="{{ $dictation->link }}" frameborder="0" allowfullscreen class="dictation-video"></iframe>
    </div>
</div>
@else
<div class="container">
    <div class="p-5 text-center alert alert-primary">
        Нет подходящего диктанта
    </div>
</div>
@endif
@endif
<!-- End Main -->
@endsection
