@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">
        @if ($data->user_type == '1')
            Single User
        @elseif ($data->user_type == '2')
            Channel Partner
        @elseif ($data->user_type == '3')
            Distributor
        @endif
        </a>
    </li>
    <li class="breadcrumb-item active"> Details </li>
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
<div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company">
                <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                </span>
                @if ($data->user_type == '1')
                    Single User Details
                @elseif ($data->user_type == '2')
                    Channel Partner Details
                @elseif ($data->user_type == '3')
                    Distributor Details
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Name</strong><br />
                                {!! $data->first_name . ' ' . $data->last_name !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Company Name</strong><br />
                                {!! $data->company_name !!}<br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Email </strong><br />
                                {!! $data->email !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Phone</strong><br />
                                {!! $data->phone_num !!}<br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Mobile </strong><br />
                                {!! $data->mobile_num !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Summary</strong><br />
                                {!! $data->summary !!}<br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Zip Code</strong><br />
                                {!! $data->zip_code !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">State</strong><br />
                                {!! $data->state_name !!}<br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Address 1 </strong><br />
                                {!! $data->address_1 !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Address 2</strong><br />
                                {!! $data->address_2 !!}<br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">City </strong><br />
                                {!! $data->city !!}<br />
                            </span>
                        </div>
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">User Type</strong><br />
                                @if ($data->user_type == '1')
                                    Single User
                                @elseif ($data->user_type == '2')
                                    Channel Partner
                                @elseif ($data->user_type == '3')
                                    Distributor
                                @endif
                                <br />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Status</strong><br />
                                {!! ($data->status == '1') ? 'Active':'In-active' !!}<br />
                            </span>
                        </div>
                        @if ($data->user_type == '1' && isset($data->parent_first)  && $data->parent_first != '')
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Distributor </strong><br />
                                {!! $data->parent_first. ' ' .$data->parent_last  !!}<br />
                            </span>
                        </div>
                        @elseif ($data->user_type == '2' && isset($data->name) && $data->name != '')
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Channel Name </strong><br />
                                {!! $data->name !!}<br />
                            </span>
                        </div>
                        @elseif ($data->user_type == '3' && isset($count->total_users) && $count->total_users != '')
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">No of Users </strong><br />
                                {!! $count->total_users  !!}<br />
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="invoice-header">
                        <div class="invoice-from">
                            <span class="m-t-5 m-b-5">
                                <strong class="text-inverse">Image</strong><br />           
                                @if ($data->image && file_exists(uploadsDir('users') . $data->image))
                                    <img width="150" height="150" src="{!! asset(uploadsDir('users').$data->image) !!}">
                                @endif
                                <br />
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-note">
                <a href="{!! route('admin.administrators.index') !!}" class="btn btn-md btn-inverse">Back</a>
            </div>
        </div>
@endsection
