@extends('admin.layouts.default')
@section('title', 'Add Questions')
@section('content')

<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.users.index') !!}">
        @if ($data->user_type == '1')
            Single User
        @elseif ($data->user_type == '2')
            Channel Partner
        @elseif ($data->user_type == '3')
            Distributor
        @endif
    </a></li>
    <li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header">
    <small>
    @if ($data->user_type == '1')
        SINGLE USER
    @elseif ($data->user_type == '2')
        CHANNEL PARTNER
    @elseif ($data->user_type == '3')
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
                    @if ($data->user_type == '1')
                        Edit Single User Details
                    @elseif ($data->user_type == '2')
                        Edit Channel Partner Details
                    @elseif ($data->user_type == '3')
                        Edit Distributor Details
                    @endif
                </h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="panel-body">
                
                @include('admin.partials.errors')
                <!-- body content -->
                <form action="{!! route('admin.users.update', $data->id) !!}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">First Name</label>
                            <input class="form-control" value="{!! old('first_name', $data->first_name) !!}" type="text" name="first_name" id="first_name" placeholder="First name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input class="form-control"  value="{!! old('last_name', $data->last_name) !!}" type="text" name="last_name" id="last_name" placeholder="Last name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone_num">Phone</label>
                            <input class="form-control"  value="{!! old('phone_num', $data->phone_num) !!}" type="text" name="phone_num" id="phone_num" placeholder="Phone">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="mobile_num">Mobile</label>
                            <input class="form-control"  value="{!! old('mobile_num', $data->mobile_num) !!}" type="text" name="mobile_num" id="mobile_num" placeholder="Mobile">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control"  value="{!! old('email', $data->email) !!}" type="text" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="summary">Summary</label>
                           <textarea class="textarea form-control" value="{!! old('summary', $data->summary) !!}"  id="summary" name="summary" placeholder="Enter Summary ..." >{!! old('summary', $data->summary) !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="zip_code">Zip Code</label>
                            <input class="form-control" value="{!! old('zip_code', $data->zip_code) !!}"  type="text" name="zip_code" id="zip_code" placeholder="Zip Code">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control" type="file" value="{!! old('image', $data->image) !!}" name="image" id="image" placeholder="image">
                            <input type="hidden" name="previous_image" value="{!! $data->image !!}" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="state">State</label>
                            <select name="state" class="default-select2 form-control">
                                @foreach ($states as $state)
                                    <option value="{!! $state->short_code !!}" {!! matchSelected($data->state, $state->short_code) !!}>{!! $state->name  !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="city">City</label>
                            <input class="form-control" value="{!! $data->city !!}" type="text" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="address_1">Address 1</label>
                           <textarea class="textarea form-control" id="address_1" name="address_1" placeholder="Enter Address 1 ..." >{!! old('address_1', $data->address_1) !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="address_2">Address 2</label>
                           <textarea class="textarea form-control" id="address_2" name="address_2" placeholder="Enter Address 2 ..." >{!! old('address_2', $data->address_2) !!}</textarea>
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
                            <input class="form-control" value="{!! $data->company_name !!}" type="text" name="company_name" id="company_name" placeholder="Company Name">
                        </div>
                        @if ($data->user_type == '1')
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="parent_id">Parent</label>
                            <select name="parent_id" class="default-select2 form-control">
                                @foreach ($distributors as $distributor)
                                    <option value="{!! $distributor->id !!}"  {!! matchSelected($data->parent_id, $distributor->parent_id) !!}>{!! $distributor->first_name . ' - ' . $distributor->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        @elseif ($data->user_type == '2')
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="channel">Channel Name</label>
                            <select name="channel" class="default-select2  form-control">
                                    <option value="{!! $data->channel_id !!}"  selected>{!! $data->channel_name !!}</option>
                                @foreach ($channels as $channel)
                                    <option value="{!! $channel->id !!}"  {!! matchSelected($data->id, $channel->channel_partner_id) !!}>{!! $channel->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <input class="form-control" value="{!! $data->user_type !!}" type="hidden" name="user_type" id="user_type" placeholder="User Type">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {!! matchSelected(1, $data->status) !!}>Active</option>
                                <option value="0" {!! matchSelected(0, $data->status) !!}>In-active</option>
                            </select>
                        </div>
                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.users.index',['user_type' => $data->user_type]) !!}'" class="btn btn-black w-100px me-5px">Back</button>

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
    $('.default-select2').select2();
});
</script>
@stop