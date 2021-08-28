@extends("layouts.main.app")

@section("title")
Профильная Страница
@endsection

@section("content")
<div class="container">
	@if ($message)
	 <div class="alert alert-success">
	  {{$message}}
	</div>
	@endif
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <img id="img-fluid" src="{{ asset('/storage/'.auth()->user()->image) }}" alt="" class="profile-image">
      <h1 class="display-4">Добро пожаловать {{auth()->user()->name}}</h1>
      <button type="button" class="bi bi-pencil-square btn btn-primary" data-toggle="modal" data-target="#exampleModal"></button>
    </div>
    <form  enctype="multipart/form-data" method="post" name="imagesform" id="imagesform" >
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div>
            <input name="image" class="profile-image-input" type="file" id="image">
            <label for="image" id="profile-image-invalid" class="text-danger profile-image-invalid"></label>
            <label for="image" id="profile-image-label"></label>
        </div> 
        <button data-token='{{csrf_token()}}' type="submit" class="btn btn-primary" id="saveImage">Загрузить</button>
    </form>
	<br>
	<div class="card-deck mb-3 text-center">
	@foreach(auth()->user()->results as $result)
		<div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$result->dictation->title}}</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Начало: {{$result->dictation->started_at}}</li>
              <li>Конец: {{$result->dictation->finished_at}}</li>
              <li><div class="card-body">                
               <textarea class="dictation-input form-control" name="text" readonly="true" placeholder="{{ $result->text }}" id="text" cols="30" rows="10"></textarea>
           </div></li>
            </ul>
            <span class="text">{{$result->created_at}}</span>
          </div>
        </div>
	@endforeach
    </div>
</div>

<button onclick="save()">Save</button>
<img id="image1" width="500px" height="500px" />
<br>
<script>
    file1 = document.querySelector('#image');
    image1 = document.querySelector('#image1');

    function save(){
        let f = file1.files[0];
        if (f) {
            image1.src = URL.createObjectURL(f);
            localStorage.setItem('myImage', image1.src);
        }
    }
    
    image1.src = localStorage.getItem('myImage')
</script>

<!-- Button trigger modal -->
<!-- Modal -->
@include('layouts.main.includes.modal.app')
<!-- End Modal -->

<script>
     // Profile
$("#profile-change-name").click(function(e){
  $('#loader')[0].classList.add('spinner-border');
  $("#loader")[0].classList.add('spinner-border-sm');
  let token = $(this).data('token');
  let profileName = document.querySelector('#profile-name').value;
   $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': token }
    });
  $.ajax({
    url:'profile/name-update',
    type:'PUT',
    data: {'name': profileName},
    success: function(data) {
      location.reload();
    },
    error: function(error) {
      let profileInvalid = document.querySelector("#profile-name-invalid")
      profileInvalid.style.display = 'block';
      profileInvalid.innerText = `${error.responseJSON.errors['name'][0]}`;
    }
  })
})
  
$("#saveImage").click(function(e){
  let token = $(this).data('token');
  data = new FormData();
    jQuery.each(jQuery('#image')[0].files, function(i, file) {
        data.append('image', file);
    });
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': token }
    });
    $.ajax({
        url: 'profile/image-upload',
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
    contentType:false,        
        success: function (data) {
          location.reload();
        },
        error: function(data) {
          profileImage = document.querySelector('#profile-image-invalid');
          profileImage.style.display = 'block';
          profileImage.innerText = `${data.responseJSON.errors['image'][0]}`;
        }
    });
    return false;
});
</script>

@endsection