<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="dark-mode">
<head>
	@include('admin.includes.head')
	<!-- DATA-TABLES -->
	<link href="{!! asset('assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') !!}" rel="stylesheet" />
	<!-- SWEAT-ALERT -->
	<link href="{!! asset('assets/plugins/sweetalert/css/sweet-alert.css') !!}" rel="stylesheet" />
	<!-- SELECT2-CSS-->
	<link rel="stylesheet" type="text/css" href="{!! URL::to('assets/plugins/select2/dist/css/select2.min.css') !!}"/>
	@yield('css')
</head>

<body class="pace-top">
	@include('admin.includes.component.page-loader')
	
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed show">
		
		@include('admin.includes.header')		
		@include('admin.includes.sidebar')
		
		
		<div id="content" class="content">
		@yield('content')
		</div>
		
		@include('admin.includes.footer')
		
		@include('admin.includes.component.scroll-top-btn')
		
	</div>
	
	@include('admin.includes.page-js')
	<!-- SELECT2-JS-->
	<script type="text/javascript" src="{!! URL::to('assets/plugins/select2/dist/js/select2.min.js') !!}"></script>
	@yield('js')
</body>
</html>
