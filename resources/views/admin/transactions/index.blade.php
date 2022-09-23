@extends('admin.layouts.default')

@section('title', 'Transactions')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Transactions </li>
</ol>
<h1 class="page-header"><small>Transactions</small></h1>
<div class="row">
	<!-- begin col-12 -->
	<div class="col-xl-12">
        @include('admin.partials.errors')

		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Transactions</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				
				<table id="data-table-combine" class="table table-striped table-bordered table-td-valign-middle">
					<thead>
						<tr>
							<th width="1%"></th>
							<th class="text-nowrap">User Name</th>
							<th class="text-nowrap">Stripe Charge Id</th>
							<th class="text-nowrap">Charged Amount</th>
							<th class="text-nowrap">Description</th>
							<th data-orderable="false">Created At</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($records as $key => $transaction)
							<tr class="odd gradeX">
								<td width="1%" class="f-s-600 text-inverse">{!! $transaction->id !!}</td>
								<td>{!! $transaction->fullname !!}</td>
								<td>{!! $transaction->stripe_charge_id !!}</td>
								<td>{!! $transaction->charged_amount !!}</td>
								<td>{!! $transaction->description !!}</td>
								<td>{!! $transaction->created_at !!}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- end panel-body -->
		</div>
	</div>
	<!-- end col-10 -->
</div>
@endsection