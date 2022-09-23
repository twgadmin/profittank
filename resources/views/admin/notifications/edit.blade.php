@extends('admin.layouts.default')

@section('title', 'Notifications Edit')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.notifications.index') !!}">Notifications</a></li>
    <li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>Notifications</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">

                @include('admin.partials.errors')
                
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Notifications</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <!-- body content -->
                <form action="{!! route('admin.notifications.update', $data->id) !!}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="from_id">From *</label>
                           <select class="form-control js-example-basic-multiple" name="from_id" id="from_id">
                                @foreach($users as $user)
                                    <option value="{!! $user->id !!}" {!! matchSelected($data->from_id, $user->id) !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="to_id">To *</label>
                            <select class="form-control js-example-basic-multiple" name="to_id" id="to_id">
                                @foreach($users as $user)
                                    <option value="{!! $user->id !!}" {!! matchSelected($data->to_id, $user->id) !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="notification_text">Notification Text *</label>
                             <input type="text" id="notification_text" name="notification_text" maxlength="65" value="{!! old('notification_text', $data->notification_text) !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="switcher_checkbox_1">Is Read *</label>
                           
                        <div class="switcher mt-2" >
                              <input type="checkbox" name="is_read" id="switcher_checkbox_1" {!! matchChecked($data->is_read, 1) ? 'checked':'' !!} data-toggle="toggle" data-style="ios slow" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                              <label for="switcher_checkbox_1"></label>
                        </div>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="route">Route *</label>
                            <input type="text" id="route" name="route" maxlength="65" value="{!! old('route', $data->route) !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="route_value">Route Value *</label>
                            <input type="text" id="route_value" name="route_value" maxlength="65" value="{!! old('route_value', $data->route_value) !!}" class="form-control" />
                        </div>

                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.notifications.index') !!}'" class="btn btn-black w-100px me-5px">Back</button>

                            <button type="submit" class="btn btn-success w-100px me-5px">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript"> 
$(document).ready(function() {
   $('.js-example-basic-multiple').select2();
});
</script>
@stop