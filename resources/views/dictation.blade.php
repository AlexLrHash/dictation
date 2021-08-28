@extends("layouts.main.app")

@section("title")
Страница Диктанта
@endsection

@section("content")
@if ($dictationResult)
<!-- Dictation -->
<div class="container">
  @if ($dictationResult->user_id == auth()->user()->id)
	<div class="col-md-8">
        <div class="card">
            <div class="card-header">Название диктанта: {{ $dictationResult->dictation->title }}</div>
            <div class="card-body">                
               <textarea class="dictation-input form-control" name="text" readonly="true" placeholder="{{ $dictationResult->text }}" id="text" cols="30" rows="10"></textarea>
           </div>
       </div>
   </div>
   <div class="ml-3 mt-2">
      <div>
        <span>Дата диктанта: {{ $dictationResult->dictation->started_at }} - {{ $dictationResult->dictation->finished_at }}</span>
      </div>
      <div>
        <span>Дата сдачи диктанта: {{ $dictationResult->created_at }}</span>
      </div>
   </div>
  @else
  <div class="p-5 text-center alert alert-warning">
    Вы не сдавали этот диктант
  </div>
  @endif
</div>
<!-- End Dictation -->
@else
<div class="container">
<div class="p-5 text-center alert alert-warning">
    Такого диктанта не существует
</div>
</div>
@endif

@endsection