@extends('admin.layouts.default')

@section('title', 'Users Login')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Users Login </li>
</ol>
<h1 class="page-header"><small>Users Login </small></h1>
<div class="row">
    <!-- begin col-12 -->
    <div class="col-xl-12">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Users Login </h4>
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
                            <th class="text-nowrap">ID</th>
                            <th class="text-nowrap">User ID</th>
                            <th class="text-nowrap">User Name</th>
                            <th class="text-nowrap">Email</th>
                            
                            <th class="text-nowrap">IP</th>
                            
                            <th class="text-nowrap">Login Time</th>
                            <th data-orderable="false">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $users)
                            <tr class="odd gradeX">
                                <td>{!! $users->id !!}</td>                            
                                <td>{!! $users->user_id !!}</td> 
                                <td>{!! $users->first_name. ' ' .$users->last_name !!}</td> 
                                <td>{!! $users->email !!}</td> 
                                <td>{!! $users->ip !!}</td>
                                <td>{!! $users->created_at !!}</td>
                          

                                <td class="center text-center">
                                   
                                    <a href="javascript:;" onclick="deleteRecord({!! $users->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
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
        var url = "{!! route('admin.users-login.destroy', ':id') !!}";
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