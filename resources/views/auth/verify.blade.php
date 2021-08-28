@extends('layouts.main.app')

@section('title')
Проверка Email
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свой email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка была скинута вам на почту') }}
                        </div>
                    @endif

                    {{ __('Перед продолжением проверьте свой email') }}
                    {{ __('Если вам не пришло сообщение') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сдесь для отправки eще одного') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
