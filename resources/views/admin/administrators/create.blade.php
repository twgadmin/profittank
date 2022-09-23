@extends('admin.layouts.default')
@section('title', 'ADMINISTRATOR')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Administrator</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<h1 class="page-header"><small>ADMINISTRATOR</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Admin</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
                
                @include('admin.partials.errors')
                <!-- body content -->
                <form action="{!! route('admin.administrators.store') !!}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name" value="{!! old('first_name') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name" value="{!! old('last_name') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone">Phone</label>
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" value="{!! old('phone') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="picture">Profile Picture </label>
                            <input class="form-control" type="file" name="picture">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="{!! old('email') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="is_active">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">In-active</option>
                            </select>
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