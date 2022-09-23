@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active">Channels </li>
</ol>
<h1 class="page-header"><small>CHANNELS</small></h1>
<div class="row">
	<!-- begin col-12 -->
	<div class="col-xl-12">
        @include('admin.partials.errors')

		<div class="panel panel-inverse">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">CHANNELS</h4>
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
							<th class="text-nowrap">Channel Partner</th>
							<th class="text-nowrap">Channel Name</th>
							<th class="text-nowrap">Channel Identifier</th>
							<th class="text-nowrap">Video Cover</th>
							<th data-orderable="false">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($channels as $key => $channel)
							<tr class="odd gradeX">
								<td width="1%" class="f-s-600 text-inverse">{!! $channel->id  !!}</td>
								<td>
                             	@if ($channel->channel_partner_id != 0)
                                {!! $channel->channel_partner_first_name . ' - ' . $channel->channel_partner_last_name !!}
                                @endif
                            	</td>
								<td>{!! $channel->name !!}</td>
								<td>{!! $channel->identifier !!}</td>
								<td>                 
                                @if ($channel->video_cover && file_exists(uploadsDir('channels') . $channel->video_cover))
                                    <img width="75" height="75" src="{!! asset(uploadsDir('channels').$channel->video_cover) !!}">
                                @endif
                            	</td>
								<td class="text-center">
									<a href="{!! route('admin.channels.show', $channel->id) !!}" class="btn btn-md btn-icon btn-circle btn-primary">
										<i class="fa fa-search"></i>
									</a>

									<a href="{!! route('admin.channels.edit', $channel->id) !!}" class="btn btn-md btn-icon btn-circle btn-success">
										<i class="fa fa-edit"></i>
									</a>

									<a href="javascript:;" onclick="deleteRecord({!! $channel->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
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
                    url: "channels/" + id,
                    type: "DELETE",
                    data: {"_token": "{{ csrf_token() }}", "_mthod": "DELETE", 'id' : id},
                    success: function (response) {
                        if (response.error == '0') {
                        	swal({
                        		title: "Success!",
                        		text: "Channel has been deleted successfully.",
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