<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layout.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pace.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  @yield('styles')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
  @include('layouts.shared.header')
  @include('layouts.shared.sidebar')
  @include('layouts.shared.container')
  @include('layouts.shared.footer')
  @include('layouts.shared.ctrlbar')
  <div class="control-sidebar-bg"></div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/fastclick.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@yield('scripts')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>