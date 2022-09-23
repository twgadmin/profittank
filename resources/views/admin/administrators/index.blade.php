@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Administrators </li>
</ol>
<h1 class="page-header"><small>ADMINISTRATORS</small></h1>
<div class="row">
	<!-- begin col-12 -->
	<div class="col-xl-12">
        @include('admin.partials.errors')

		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">ADMINISTRATORS</h4>
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
							<th class="text-nowrap">First Name</th>
							<th class="text-nowrap">Last Name</th>
							<th class="text-nowrap">Phone</th>
							<th class="text-nowrap">Email</th>
							<th data-orderable="false">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($records as $key => $admin)
							<tr class="odd gradeX">
								<td width="1%" class="f-s-600 text-inverse">{!! $admin->id !!}</td>
								<td>{!! $admin->first_name !!}</td>
								<td>{!! $admin->last_name !!}</td>
								<td>{!! $admin->phone !!}</td>
								<td>{!! $admin->email !!}</td>
								<td class="text-center">
									<a href="{!! route('admin.administrators.show', $admin->id) !!}" class="btn btn-md btn-icon btn-circle btn-primary">
										<i class="fa fa-search"></i>
									</a>
									@if (auth()->user()->id == '1' || $admin->id == auth()->user()->id)
									<a href="{!! route('admin.administrators.edit', $admin->id) !!}" class="btn btn-md btn-icon btn-circle btn-success">
										<i class="fa fa-edit"></i>
									</a>
									@else
									<a href="{!! route('admin.administrators.edit', $admin->id) !!}" class="btn btn-md btn-icon btn-circle btn-success  disabled">
										<i class="fa fa-edit"></i>
									</a>
									@endif

									@if ($admin->id == '1' || auth()->user()->id != 1)
										<a href="javascript:;" class="btn btn-md btn-icon btn-circle btn-danger disabled">
											<i class="fa fa-trash"></i>
										</a>
									@else
										<a href="javascript:;" onclick="deleteRecord({!! $admin->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
											<i class="fa fa-trash"></i>
										</a>
									@endif
								</td>
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
@section('js')
	<script>
	function deleteRecord(id) {
		var url = "{!! route('admin.administrators.destroy', ':id') !!}";
		url = url.replace(':id', id);
        swal({
            title: "Are you sure?",
            text: "You want to delete this record.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            }, function(){
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {"_token": "{{ csrf_token() }}", "_mthod": "DELETE", 'id' : id},
                    success: function (response) {
                        if (response.error == '0') {
                        	swal({
                        		title: "Success!",
                        		text: "Administrator has been deleted successfully.",
                        		type: "success"
                        	}, function() {
                        		location.reload();
                        	}, 1000);
                        } else {
                        	swal("Error!", response.message , "error");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong, please try again later!" , "error");
                    }
                });
            });
    }
    </script>
@endsection