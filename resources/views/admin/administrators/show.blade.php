@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Administrator</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>ADMINISTRATOR</small></h1>
<div class="invoice">
			<!-- begin invoice-company -->
			<div class="invoice-company">
				<span class="pull-right hidden-print">
					<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
				</span>
				Details
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">First Name</strong><br />
								{!! $data->first_name !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Last Name</strong><br />
								{!! $data->last_name !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Phone</strong><br />
								{!! $data->phone !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Email </strong><br />
								{!! $data->email !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						@if ($data->picture != '' && file_exists(uploadsDir('admin') . $data->picture))
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Profile</strong><br />
								<img src="{!! asset(uploadsDir('admin') . $data->picture) !!}" width="100px" /><br />
							</span>
						</div>
		                @endif
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Status</strong><br />
								{!! ($data->status == '1') ? 'Active':'In-active' !!}<br />
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.administrators.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection
