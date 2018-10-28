<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('css/admincp/icons/logo-icon.png') }}">
  <title>{{ $template['title'] }} - {{ config('app.name') }}</title>
  <link href="{{ asset('css/admincp/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admincp/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admincp/dataTables.bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admincp/style.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admincp/bootstrap-notifications.css') }}" rel="stylesheet">
  <!-- Add start ThangTGM 11/10/2018 -->
  <link href="{{ asset('css/admincp/custom.css') }}" rel="stylesheet">
  <!-- Add end -->
  @yield('styles')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper">
		@include('back.layouts.header')
    <div class="page-wrapper">
    	@include('back.layouts.breadcrumb')
			@yield('content')
			<div id="ajax-messases-loading">Đang xữ lý........</div>
      <footer class="footer text-center">
        All Rights Reserved. Copyright {{ date('Y') }}
      </footer>
    </div>
  </div>
  <script src="{{ asset('js/admincp/jquery.min.js') }}"></script>
  <script src="{{ asset('js/admincp/popper.min.js') }}"></script>
  <script src="{{ asset('js/admincp/pusher.min.js') }}"></script>
  <script src="{{ asset('js/admincp/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/admincp/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('js/admincp/waves.js') }}"></script>
  <script src="{{ asset('js/admincp/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/admincp/select2.min.js') }}"></script>
  <script src="{{ asset('js/admincp/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/admincp/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/admincp/jquery.form.min.js') }}"></script>
  <script src="{{ asset('js/admincp/ajax-form.js') }}"></script>
  <script src="{{ asset('js/admincp/custom.js') }}"></script>
  @yield('scripts')
  @include('back.partials.notifications_bind')
  @isset($template['form-datatable'])
  <script type="text/javascript">
      $('#table-data-content').DataTable(optionsDataTable);
  </script>
  @endisset
</body>
</html>