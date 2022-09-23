@extends('admin.layouts.default')

@section('title', 'Messages')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Messages</li>
</ol>
<h1 class="page-header"><small>Messages</small></h1>
<div class="row">
	<!-- begin col-12 -->
	<div class="col-xl-12">

        @include('admin.partials.errors')

		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Messages</h4>
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
							<th class="text-nowrap">To </th>
							<th class="text-nowrap">From</th>
							<th class="text-nowrap">Message </th>
							<th class="text-nowrap">Media</th>
							<th class="text-nowrap">Is Read </th>
							<th class="text-nowrap">Created at</th>
							<th data-orderable="false">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($records as $key => $record)
							<tr class="odd gradeX">
								<td>{!! $record->to_fullname !!}</td>
								<td>{!! $record->from_fullname !!}</td>
								<td>{!! $record->message !!}</td>
								<td>
 								@if ($record->media != '' && file_exists(uploadsDir("messages") . $record->media))
                                    <a href="{!! asset(uploadsDir('messages') . $record->media) !!}" download>Attachment ({!! $record->media_size !!} MB)</a>
                                @endif
								</td>
								<td>{!! ($record->is_read == 0) ? 'NO' : 'YES' !!}</td>
								<td>{!! $record->created_at !!}</td>
								<td class="text-center">
									<a href="{!! route('admin.messages.show', $record->id) !!}" class="btn btn-md btn-icon btn-circle btn-primary">
										<i class="fa fa-search"></i>
									</a>

									<a href="{!! route('admin.messages.edit', $record->id) !!}" class="btn btn-md btn-icon btn-circle btn-success">
										<i class="fa fa-edit"></i>
									</a>
									<a href="javascript:;" onclick="deleteRecord({!! $record->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
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
                    url: "messages/" + id,
                    type: "DELETE",
                    data: {"_token": "{{ csrf_token() }}", "_mthod": "DELETE", 'id' : id},
                    success: function (response) {
                        if (response.error == '0') {
                        	swal({
                        		title: "Success!",
                        		text: "Media File  has been deleted successfully.",
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