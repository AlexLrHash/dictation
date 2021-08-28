<!DOCTYPE html>
<html lang="en">
	<!-- Head -->	
	@include('layouts.admin.includes.head.app')
	<!-- End Head -->
<body>
	<!-- Header -->
	@include('layouts.admin.includes.header.app')
	<!-- End Header -->

<!-- Breadcrumbs -->
<div class="container mt-5">
@yield('breadcrumb')  
  @if ($message['text'])
  <div class="alert alert-{{ $message['color'] }}">
    {{$message['text']}}
  </div>
  @endif
</div>

<!-- End Breadcrumbs -->
<div class="container">
  <div class="jumbotron admin-info">
    <div class="row">
    <h1 class="col-10 display-6">@yield("name")</h1>
    @yield('create')
    </div>
    <div class="row">
      @yield('form')
    </div>
      <br>

    @yield("table")
    </div>
  </div>
  <br>
	<!-- Footer -->
	@include('layouts.admin.includes.footer.app')
	<!-- EndFooter -->

  <!-- Datepicker -->
  @include('layouts.admin.includes.datepicker.app')
  <!-- End datepicker -->
	
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>