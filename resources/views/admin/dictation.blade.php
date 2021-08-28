@extends("layouts.admin.app")

@section("title")
Диктанты
@endsection

@section("name")
Диктанты
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('admin.dictations') }}
@endsection

@section("create")
<div class="col form-inline mt-2 mt-md-0">
  <button type="button" class="bi bi-plus-square btn btn-success " data-toggle="modal" data-target="#exampleModalCenter">
  </button>
</div>
@endsection


@section("form")
<!-- Modal -->
@include('layouts.admin.includes.modal.app')
<!-- End Modal -->
@endsection


@section("table")
<!-- Table -->
<table class="table" id="table">
  <thead>
    <tr>
      <th>#</th>
      <th><div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Название</div></th>
      <th><div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Ссылка</div></th>
      <th><div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Начало</div></th>
      <th><div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Конец</div></th>
      <th><div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Дата создания</div></th>
      <th></th>
    </tr>
  </thead>
  <tbody id='tbody'>
    @foreach($dictations as $dictation)
    <tr>
      <th scope="row">{{ $dictation->id }}</th>
      <td>{{ $dictation->title }}</td>
      <td id='email_field'>{{ $dictation->link }}</td>
      <td>{{ $dictation->started_at->format('d.m.Y h:i') }}</td>
      <td>{{ $dictation->finished_at->format('d.m.Y h:i') }}</td>
      @if ($dictation->created_at->diffInDays(Carbon\Carbon::now()) == 0)
      <td>Недавно</td>
      @else
      <td>{{ $dictation->created_at->diffInDays(Carbon\Carbon::now()) }} дней назад</td>
      @endif
      <td>
        <input type="hidden" id="id" name="id" value="{{ $dictation->id }}">
        <button class="bi bi-pencil-square btn btn-primary change-dictation-modal" data-toggle="modal" data-target="#exampleModalCenter" type="button" data-dictation='{{$dictation}}' data-token='{{csrf_token()}}'></button>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
<!-- End Table -->
<div class="page-links">
  {{ $dictations->links() }}
</div>
@endsection

