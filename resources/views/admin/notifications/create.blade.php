@extends('admin.layouts.default')
@section('title', 'Notifications')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.notifications.index') !!}">Notifications</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<h1 class="page-header"><small>Notifications</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">

                @include('admin.partials.errors')
                
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Notifications</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
                <!-- body content -->
                <form action="{!! route('admin.notifications.store') !!}" method="POST" role="form">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="from_id">From *</label>
                           <select class="form-control js-example-basic-multiple" id="from_id" name="from_id">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id!!}}" {!! ($user->id == old('user_id')) ? 'selected' : '' !!}}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>      
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="to_id">To *</label>
                            <select class="form-control js-example-basic-multiple" id="to_id" name="to_id">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id!!}}" {!! ($user->id == old('user_id')) ? 'selected' : '' !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>  
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="notification_text">Notification Text *</label>
                            <input type="text" name="notification_text" id="notification_text" class="form-control" maxlength="65" value="{!! old('notification_text') !!}" placeholder="Notification Text">   
                        </div> 
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="switcher_checkbox_1">Is Read *</label>
                           
                        <div class="switcher mt-2" >
                              <input type="checkbox" name="is_read" id="switcher_checkbox_1" data-toggle="toggle" data-style="ios slow" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                              <label for="switcher_checkbox_1"></label>
                        </div>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="route">Route *</label>
                            <input type="text" name="route" id="route" class="form-control" maxlength="65" placeholder="Route" value="{!! old('route') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="route_value">Route Value *</label>
                             <input type="text" name="route_value" id="route_value" class="form-control" maxlength="65" placeholder="Route Value" value="{!! old('route_value') !!}">   
                        </div>
                        <div class="col-xl-12">
                            <hr>
                            <button type="submit" class="btn btn-primary w-100px me-5px">Create</button>
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