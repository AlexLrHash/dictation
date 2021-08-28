@extends("layouts.admin.app")

@section("title")
Результаты Диктантов
@endsection

@section("name")
Результаты Диктантов
@endsection

@section("form")
<div class="row">
  <form method="get" action="{{ route('admin.dictation_results') }}" class="ml-5 form-inline mt-2 mt-md-0">
    <i data-search='user_email' class="bi bi-x clear-search clear-search-btn"></i>
    <input class="form-control mr-sm-2" name="search" id="user_email" type="text" value="{{ $searchValue }}" placeholder="Поиск" aria-label="Search">
    <input autocomplete="off" type="text" name="filteName" value="{{ $filterValue }}" class="form-control input-lg" id="filter" placeholder="" data-token='{{ csrf_token() }}'>
    <input type="hidden" id='filterid' value="{{ $filterId }}" name='filter' readonly>
    <button class="bi ml-2 bi-search btn btn-secondary dictation-search" type="submit"></button>
    <a class="bi ml-2 bi-arrow-counterclockwise btn btn-secondary" href="{{ route('admin.dictation_results') }}"></a>
  </form>
</div>
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('admin.dictation_results') }}
@endsection
@section("table")
<table class="table" id="table">
  <thead>
    <tr>
     <div class="row">
      <th>
        <div class="row">
          <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">#</div>
          <div class="">
            <form action="" class="sort_form" id="id_ASC">
              <input type="hidden" name="order" id='order' value="ASC">
              <input type="hidden" name="sort" id="sort" value="id">
              <button type="submit" class=' {{$sort=="id" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'></button>
            </form>
            <form action="" class="sort_form" id="ids_DESC">
              <input type="hidden" name="order" id='order' value="DESC">
              <input type="hidden" name="sort" id="sort" value="id">
              <button type="submit" class='{{$sort=="id" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down ' id="sort_desc_name" ></button>
            </form>
          </div>
        </div>
      </th>
      <th>
        <div class="row">
          <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Имя Диктанта</div>
          <div class="">
            <form action="" class="sort_form" id="title_of_dictation_ASC">
              <input type="hidden" name="order" id='order' value="ASC">
              <input type="hidden" name="sort" id="sort" value="title_of_dictation">
              <button type="submit" class=' {{$sort=="title_of_dictation" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'></button>
            </form>
            <form action="" class="sort_form" id="title_of_dictation_DESC">
              <input type="hidden" name="order" id='order' value="DESC">
              <input type="hidden" name="sort" id="sort" value="title_of_dictation">
              <button type="submit" class=' {{$sort=="title_of_dictation" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down ' id="sort_desc_name" ></button>
            </form>
          </div>
        </div>
      </th>
    </div>
    <th>
      <div class="row">
        <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Имя Пользователя</div>
        <div class="">
          <form action="" class="sort_form" id="user_name_ASC">
             <input type="hidden" name="order" id='' value="ASC">
            <input type="hidden" name="sort" id="sort" value="user_name">
            <button type="submit" class=' {{$sort=="user_name" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up ' ></button>            
          </form>
          <form action="" class="sort_form" id="user_name_DESC">
            <input type="hidden" name="order" id='' value="DESC">
            <input type="hidden" name="sort" id="sort" value="user_name">  
            <button type="submit" class=' {{$sort=="user_name" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down' id="sort_desc_name"></button>
          </form>
        </div>
      </div>
    </th>
    <th>
      <div class="row"> 
        <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Email</div>
        <div class="">
          <form action="" class="sort_form" id="user_email_ASC">
            <input type="hidden" name="order" id='' value="ASC">
            <input type="hidden" name="sort" id="sort" value="user_email">
            <button type="submit" class=' {{$sort=="user_email" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'></button>            
          </form>
          <form action="" class="sort_form" id="user_email_DESC">
            <input type="hidden" name="order" id='' value="DESC">
            <input type="hidden" name="sort" id="sort" value="user_email">
            <button type="submit" class=' {{$sort=="user_email" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down ' id="sort_desc_name"></button>
          </form>
        </div>
      </div>
    </th>
    <th>
      <div class="row">
        <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Дата записи</div>
        <div class="">
          <form action="" class="sort_form" id="input_at_ASC">
            <input type="hidden" name="order" id='' value="ASC">
            <input type="hidden" name="sort" id="sort" value="input_at">
            
            <button type="submit" class=' {{$sort=="input_at" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'></button>            
            <!-- class="btn btn-outline-primary" -->
          </form>
          <form action="" class="sort_form" id="input_at_DESC">
            <input type="hidden" name="order" id='' value="DESC">
            <input type="hidden" name="sort" id="sort" value="input_at"> 
            <button type="submit" class=' {{$sort=="input_at" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down ' id="sort_desc_name"></button>
            <!-- class="btn btn-outline-primary" -->
          </form>
        </div>
      </div>  
    </th>
    <th></th>
  </div>
</tr>
</thead>
<tbody id='tbody'>
  @foreach($dictationResults as $dictationResult)
  <tr>
    <th scope="row">{{ $dictationResult->id }}</th>
    <td>{{ $dictationResult->dictation->title }}</td>
    <td>{{ $dictationResult->user->name }}
      <td>{{ $dictationResult->user->email }}</td>
      <td>{{ $dictationResult->created_at->format('d.m.Y h:i') }}</td>
      <td>
        <button type="button" class="bi bi-trash btn btn-primary btn_delete_dictation_modal" data-toggle="modal"  data-id='{{$dictationResult->id}}' data-token="{{ csrf_token() }}" data-target="#exampleModal">
        </button>
      </td>
    @endforeach
  </tbody>
</table>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вы действительно хотите удалить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <input type="hidden" id="delete_id" name="delete_id" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deletedictation" data-id='1' data-token='1'>
        Удалить <span id="loader" role="status" aria-hidden="true"></span>
      </button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
let _token = $('meta[name="csrf-token"]').attr('content');
 $( "#filter" ).autocomplete({
  source: function( request, response ) {
    $.ajax({
      url:"{{ route('admin.dictation_results.fetch') }}",
      type: 'post',
      dataType: "json",
       data: {
          'query': request.term,
          '_token': _token
        },
      success: function(data) {
         response(data);
      },
      error: function(data) {}
    });
  },
  select: function (event, ui) {
     // Set selection
     $('#filter').val(`${ui.item.value}`); // display the selected text
     $('#filterid').val(ui.item.id); // save selected id to input
     return false;
  }
});
</script>

<div class="page-links">
{{ $dictationResults->appends(request()->query())->links()}}
</div>
@endsection
