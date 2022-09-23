@extends('admin.layouts.default')

@section('title', 'Profile Update')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Administrator</a></li>
	<li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>ADMINISTRATOR</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">

                @include('admin.partials.errors')
                
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Details</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
                <!-- body content -->
                <form action="{!! route('admin.administrators.update', $data->id) !!}" method="POST" role="form"   enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">First Name</label>
                            <input class="form-control" type="text" value="{!! old('first_name', $data->first_name) !!}" name="first_name" id="first_name" placeholder="First name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input class="form-control" type="text" value="{!! old('last_name', $data->last_name) !!}" name="last_name" id="last_name" placeholder="Last name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="media_file">Profile Picture </label>
                            <input class="form-control" type="file" name="file">
                            <input type="text" name="picture" value="{!! old('picture', $data->picture) !!}" maxlength="128" class="form-control" style="display: none;" />
                            @if ($data->picture != '' && file_exists(uploadsDir('admin') . $data->picture))
                                <br><img src="{!! asset(uploadsDir('admin') . $data->picture) !!}" width="100px" />
                            @endif
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone">Phone</label>
                            <input class="form-control" type="number" value="{!! old('phone', $data->phone) !!}" name="phone" id="phone" placeholder="Phone">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="Password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input class="form-control" type="Password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.administrators.index') !!}'" class="btn btn-black w-100px me-5px">Back</button>

                            <button type="submit" class="btn btn-success w-100px me-5px">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
