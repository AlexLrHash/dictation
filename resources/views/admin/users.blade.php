@extends("layouts.admin.app")

@section("title")
Пользователи
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('admin.users') }}
@endsection

@section("form")
<div class="row">
  <form method="get" action="{{ route('admin.users') }}" class="ml-5 form-inline mt-2 mt-md-0">
    <i class="bi bi-x clear-search clear-search-btn" data-search='value'></i>
    <input class="form-control mr-sm-2" name="search" id="value" value="{{ $searchValue }}" type="text" placeholder="Поиск" aria-label="Search">
    
      <select name="filter" id="search_value" class="form-control">
        <option value="">Все</option>
        @foreach($userRoles as $role)
        <option  
        {{$role->id == $filterValue ?
        'selected' : ''
        }}
        value="{{ $role->id }}">
        {{ __('main.'.$role->name) }}
        </option>
        @endforeach
      </select>   
      <button class="bi ml-2 bi-search btn btn-secondary dictation-search" type="submit"></button>
      <a class="bi ml-2 bi-arrow-counterclockwise btn btn-secondary" href="{{ route('admin.users') }}"></a>
  </form>
</div>
@endsection

@section("name")
Пользователи 
@endsection

@section("table")
<table class="table" id="table">
<thead>
  <tr>
    <th>
      <div class="row">
      
      <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">#</div>
      <div class="">
        <form action="" class="sort_form" id="name_ASC">
        
        <input type="hidden" name="order" value='ASC'>
        <input type="hidden" name="sort" id="sort" value="id">
        <button type="submit" class='{{$sort=="id" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'"></button>            
      </form>
      <form action="" class="sort_form" id="name_DESC">
        <input type="hidden" name="order" value='DESC'>
        <input type="hidden" id='sort' name='sort' value="id">
        <button type="submit"class=' {{$sort=="id" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down' id="sort_desc_name"></button>
      </form>
    </div>
    </div>
    </th>
    <th>
      <div class="row">
      
      <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Имя</div>
      <div class="">
        <form action="" class="sort_form" id="name_ASC">
        
        <input type="hidden" name="order" value='ASC'>
        <input type="hidden" name="sort" id="sort" value="name">
        <button type="submit" class=' {{$sort=="name" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'"></button>            
      </form>
      <form action="" class="sort_form" id="name_DESC">
        <input type="hidden" name="order" value='DESC'>
        <input type="hidden" id='sort' name='sort' value="name">
        <button type="submit"class=' {{$sort=="name" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down' id="sort_desc_name"></button>
      </form>
    </div>
    </div>
    </th>

    <th>
      <div class="row">
    <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Email</div>
    <div class="">
        <form action="" class="sort_form" id="email_ASC">
           <input type="hidden" name="order" value="ASC">
        <input type="hidden" name="sort" id="sort_email" value="email">
       
        <button type="submit" class=' {{$sort=="email" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'></button>            
      </form>
      <form action="" class="sort_form" id="email_DESC">
         <input type="hidden" name="order" value="DESC">
        <input type="hidden" name="sort" id="sort_email" value="email">
       
        <button type="submit" class=' {{$sort=="email" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down'id="sort_desc_name" ></button>
      </form>
    </div>
  </th>
  <th>
    <!-- Добавить поле с админом -->
    <div class="row">
    <div id="table_name" class="text ml-2 mr-2 text-secondary table-name">Дата Регистрации</div>
    <div class="">
        <form action="" class="sort_form" id="created_at_ASC">
           <input type="hidden" name="order" value="ASC">
        <input type="hidden" name="sort" id="sort" value="created_at">
       

        <button type="submit" class=' {{$sort=="created_at" && $order=="ASC" ? "sort-active sort-and" : "sort-and"}} bi-chevron-up'>
        </button>           
      </form>
      <form action="" class="sort_form" id="created_at_DESC">
        <input type="hidden" name="order" value="DESC">
        <input type="hidden" name="sort" id="sort" value="created_at">
        
        <button type="submit" class=' {{$sort=="created_at" && $order=="DESC" ? "sort-active sort-or" : "sort-or"}} bi-chevron-down' id="sort_desc_name" ></button>
      </form>
    </div>
  </th>
    <th class="text ml-2 mr-2 text-secondary table-name">Статус</th>
    <th></th>
  </tr>
</thead>
<tbody id='tbody'>
  @foreach($users as $user)
  <tr>
    <th scope="row">{{ $user->id }}</th>
    <td>{{ $user->name }}</td>
    <td id='email_field'>{{ $user->email }}</td>
    <td>{{ $user->created_at->diffForHumans() }}</td>
    <td>{{ __('main.'.$user->roles->pluck('name')->first()) }}
    </td>
    <td>
      @if ( auth()->user()->id != $user->id )
      <button  data-id='{{$user->id}}' data-token="{{ csrf_token() }}" type="button" class="bi bi-trash btn btn-primary btn_delete_user_modal" data-toggle="modal" data-target="#exampleModal">
      </button>
      @else
      <button class="bi bi-trash btn btn-primary btn_delete_user_modal" disabled="">
      </button>
      @endif
    </td>
    @endforeach
  </tbody>
</table>

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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button class="btn btn-danger" id="deleteuser" data-id='1' data-token='1'>
        Удалить <span id="loader" role="status" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="page-links">
{{$users->appends(request()->query())->links()}}
</div>
@endsection
