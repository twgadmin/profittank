@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">
        @if ($user_type == '1')
            Single Users
        @elseif ($user_type == '2')
            Channel Partners
        @elseif ($user_type == '3')
            Distributors
        @endif
    </li>
</ol>
<h1 class="page-header">
    <small>
        @if ($user_type == '1')
            SINGLE USERS
        @elseif ($user_type == '2')
            CHANNEL PARTNERS
        @elseif ($user_type == '3')
            DISTRIBUTORS
        @endif
    </small>
</h1>
<div class="row">
    <!-- begin col-12 -->
    <div class="col-xl-12">
        @include('admin.partials.errors')

        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">
                    @if ($user_type == '1')
                        SINGLE USERS
                    @elseif ($user_type == '2')
                        CHANNEL PARTNERS
                    @elseif ($user_type == '3')
                        DISTRIBUTORS
                    @endif
                </h4>
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
                            @if ($user_type == '1')
                                <th  width="1%">Hide Dashboard</th>
                            @endif
                            <th width="1%"></th>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Company Name</th>
                            <th class="text-nowrap">Email</th>
                            @if ($user_type == '1')
                            <th class="text-nowrap">Distributor</th>
                            @else
                            <th class="text-nowrap">Phone</th>
                            @endif
                            <th data-orderable="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="odd gradeX">
                                @if ($user_type == '1')
                                    <td width="1%" class="f-s-600 text-inverse "><input class="hide_dashboard" type="checkbox" name="hide_dashboard" id="{!! $user->id !!}" {!! $user->hide_dashboard == 1 ? 'checked' : '' !!}></td>
                                @endif
                                <td width="1%" class="f-s-600 text-inverse">{!! $user->id !!}</td>
                                <td>{!! $user->first_name. ' ' .$user->last_name !!}</td>
                                <td>{!! $user->company_name !!}</td>
                                <td>{!! $user->email !!}</td>
                                @if ($user->user_type == '1')
                                <td>{!! $user->parent_first. ' ' .$user->parent_last  !!}</td>
                                @else
                                <td>{!! $user->phone_num !!}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{!! route('admin.users.show', $user->id)  !!}?user_type={!! $user->user_type !!}" class="btn btn-md btn-icon btn-circle btn-primary">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{!! route('admin.users.edit', $user->id) !!}?user_type={!! $user->user_type !!}" class="btn btn-md btn-icon btn-circle btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:;" onclick="deleteRecord({!! $user->id !!})" class="btn btn-md btn-icon btn-circle btn-danger">
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

    $(document).on("click", ".hide_dashboard", function() {
        var hide_dashboard;
        var message;
        if ($(this).is(':checked')) {
            hide_dashboard = 1;
            message = "User has been hide from dashboard successfully.";

        } else {
            hide_dashboard = 0;
            message = "User has been Un-hide from dashboard successfully.";

        }
        var id = $(this).attr('id');
        $.ajax({
            url: "{!! route('admin.hide-dashboard') !!}",
            type: "POST",
            data: {"_token": "{{ csrf_token() }}", "_mthod": "POST","hide_dashboard": hide_dashboard, "id" : id},
            success: function (response) {
                swal({
                    title: "Success!",
                    text: message,
                    type: "success"
                }, function() {
                    location.reload();
                }, 1000);

                $(this).prop('checked', false);
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong, please try again later!" , "error");
            }
        });
    });

    function deleteRecord(id) {
        var url = "{!! route('admin.users.destroy', ':id') !!}";
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
                                text: "User has been deleted successfully.",
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