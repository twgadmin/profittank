@extends('admin.layouts.default')
@section('title', 'Add Questions')
@section('content')

<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.users.index') !!}">
        @if (request('user_type') == '1')
            Single User
        @elseif (request('user_type') == '2')
            Channel Partner
        @elseif (request('user_type') == '3')
            Distributor
        @endif
    </a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<h1 class="page-header">
    <small>
    @if (request('user_type') == '1')
        SINGLE USER
    @elseif (request('user_type') == '2')
        CHANNEL PARTNER
    @elseif (request('user_type') == '3')
        DISTRIBUTOR
    @endif
    </small>
</h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">
                    @if (request('user_type') == '1')
                        Add Single User
                    @elseif (request('user_type') == '2')
                        Add Channel Partner
                    @elseif (request('user_type') == '3')
                        Add Distributor
                    @endif
                </h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
                
                @include('admin.partials.errors')
                <!-- body content -->
                <form action="{!! route('admin.users.store') !!}" method="POST" role="form" enctype="multipart/form-data">
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
                            <label class="form-label" for="phone_num">Phone</label>
                            <input class="form-control" type="text" name="phone_num" id="phone_num" placeholder="Phone" value="{!! old('phone_num') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="mobile_num">Mobile</label>
                            <input class="form-control" type="text" name="mobile_num" id="mobile_num" placeholder="Mobile" value="{!! old('mobile_num') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="{!! old('email') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="summary">Summary</label>
                           <textarea class="textarea form-control" id="summary" name="summary" placeholder="Enter Summary ..." >{!! old('summary') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="zip_code">Zip Code</label>
                            <input class="form-control" type="text" name="zip_code" id="zip_code" placeholder="Zip Code" value="{!! old('zip_code') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image" placeholder="image">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="state">State</label>
                            <select name="state" class="default-select2 form-control">
                                @foreach ($states as $state)
                                    <option value="{!! $state->short_code !!}"  {!! ($state==old('state')) ? 'selected' : '' !!} >{!! $state->name  !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="city">City</label>
                            <input class="form-control" type="text" name="city" id="city" placeholder="City" value="{!! old('city') !!}">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="address_1">Address 1</label>
                           <textarea class="textarea form-control" id="address_1" name="address_1" placeholder="Enter Address 1 ..." >{!! old('address_1') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="address_2">Address 2</label>
                           <textarea class="textarea form-control" id="address_2" name="address_2" placeholder="Enter Address 2 ..." >{!! old('address_2') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="Password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="confirm_password">Confirm Password</label>
                            <input class="form-control" type="Password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="company_name">Company Name</label>
                            <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Company Name" value="{!! old('company_name') !!}">
                        </div>
                        @if (request('user_type') == '1')
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="parent_id">Parent</label>
                            <select name="parent_id" class="default-select2  form-control">
                                @foreach ($distributors as $distributor)
                                    <option value="{!! $distributor->id !!}" >{!! $distributor->first_name . ' - ' . $distributor->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        @elseif (request('user_type') == '2')
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="channel">Channel Name</label>
                            <select name="channel" class="default-select2 form-control">
                                @foreach ($channels as $channel)
                                    <option value="{!! $channel->id !!}" {!! matchSelected($channel->channel, $channel->id) !!}>{!! $channel->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <input class="form-control" value="{!! request('user_type') !!}" type="hidden" name="user_type" id="user_type" placeholder="User Type">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" class="form-control">
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
@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript"> 
$(document).ready(function() {
    $('.default-select2').select2();
});
</script>
@stop