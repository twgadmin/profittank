@extends('admin.layouts.default')

@section('title', 'Notifications')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Notifications </li>
</ol>
<h1 class="page-header"><small>Notifications</small></h1>
<div class="row">
	<!-- begin col-12 -->
	<div class="col-xl-12">
		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Notifications</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				 <table class="table table-striped table-bordered table-td-valign-middle" id="data-table-combine">
                    <thead>
                        <tr>
                            <th class="text-nowrap">From</th>
                            <th class="text-nowrap">To</th>
                            <th class="text-nowrap">Notification</th>
                            <th class="text-nowrap">Is Read</th>
                            <th class="text-nowrap">Created At</th>
                            <th data-orderable="false">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $key => $notification)
                            <tr class="odd gradeX">
                                <td>{!! $notification->from_first_name . ' - ' . $notification->from_email !!}</td>                            
                                <td>{!! $notification->to_first_name . ' - ' . $notification->to_email !!}</td> 
                                <td>{!! $notification->notification_text !!}</td>
                                <td>{!! ($notification->is_read == 0) ? 'No' : 'Yes' !!}</td>
                                <td>{!! $notification->created_at !!}</td>

                                <td class="center text-center">
                                    <a href="{!! URL::route('admin.notifications.show', $notification->id) !!}" class="btn btn-md btn-icon btn-circle btn-primary"title="Show Record">
                                        <i class="fa fa-search"></i>
                                    </a>
									<!-- <a href="{!! route('admin.notifications.edit', $notification->id) !!}" class="btn btn-md btn-icon btn-circle btn-success">
										<i class="fa fa-edit"></i>
									</a> -->
                                    <a href="javascript:;" onclick="deleteRecord({!! $notification->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
											<i class="fa fa-trash"></i>
									</a>
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
		var url = "{!! route('admin.notifications.destroy', ':id') !!}";
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
                        		text: "Notifications has been deleted successfully.",
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