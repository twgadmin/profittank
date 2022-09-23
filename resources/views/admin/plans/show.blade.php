@extends('admin.layouts.default')

@section('title', 'Plans Details')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.plans.index') !!}">Plans</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>Plans Details</small></h1>
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
								<strong class="text-inverse">Plan Name:</strong><br />
								{!! $data->plan_name !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Sub Heading:</strong><br />
								{!! $data->sub_heading !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Monthly Price:</strong><br />
								{!! $data->monthly_price !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Additional Amount:</strong><br />
								{!! $data->additional_price !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Additional Price </strong><br />
								{!! ($data->is_active) == 1 ? 'Yes':'No' !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Description </strong><br />
								{!! $data->description !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Short Description:</strong><br />
								{!! $data->short_description !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Detail Description </strong><br />
								{!! $data->detail_description !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Created At:</strong><br />
								{!! $data->created_at !!}<br />
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.plans.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection
