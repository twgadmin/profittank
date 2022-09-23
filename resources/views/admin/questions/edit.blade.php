@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('assets/admin/css/jquery.datetimepicker.css') !!}"/>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{!! URL::to('assets/admin/plugins/select2/select2.css') !!}"/>
<link rel="stylesheet" type="text/css" href="{!! URL::to('assets/admin/plugins/select2/select2-metronic.css') !!}"/>
<link rel="stylesheet" href="{!! URL::to('assets/admin/plugins/data-tables/DT_bootstrap.css') !!}"/>
<!-- END PAGE LEVEL STYLES -->
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">Edit User <small></small></h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">

        @include('admin.partials.errors')

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i> Edit User
                </div>
            </div>

            <div class="portlet-body">

                <h4>&nbsp;</h4>

                <form method="POST" action="{!! route('admin.users.update', $user->id) !!}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name" class="col-md-2 control-label">First Name *</label>
                        <div class="col-md-4">
                            <input type="text" id="first_name" name="first_name" maxlength="50" value="{!! old('first_name', $user->first_name) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-md-2 control-label">Last Name </label>
                        <div class="col-md-4">
                            <input type="text" name="last_name" maxlength="50" value="{!! old('last_name', $user->last_name) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Email *</label>
                        <div class="col-md-4">
                            <input type="text" id="email" name="email" maxlength="50" value="{!! old('email', $user->email) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-md-2 control-label">Gender *</label>
                        <div class="col-md-4">
                            <select name="gender" id="gender" class="form-control js-example-basic-multiple">
                                @foreach (getGender() as $gender_id => $gender_text)
                                   <option {!! ($user->gender==$gender_id) ? 'selected' : '' !!} value="{!! $gender_id !!}">{!! $gender_text !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Country *</label>
                        <div class="col-md-4">
                            <select class="form-control js-example-basic-multiple" id="country_id" name="country_id">
                                @foreach ($countries as $country)
                                    <option value="{!! $country->id !!}" {!! ($country->id == $user->country_id) ? 'selected' : '' !!}>{!! $country->name !!}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">New Password </label>
                        <div class="col-md-4">
                            <input type="password" name="password" maxlength="50" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location" class="col-md-2 control-label">Location </label>
                        <div class="col-md-4">
                            <input type="text" id="location" name="location" maxlength="128" value="{!! old('location', $user->location) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth" class="col-md-2 control-label">Date Of Birth </label>
                        <div class="col-md-4">
                            <input type="date" id="date_of_birth" name="date_of_birth" maxlength="128" value="{!! old('date_of_birth', $user->date_of_birth) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="occupation" class="col-md-2 control-label">Occupation </label>
                        <div class="col-md-4">
                            <input type="text" id="occupation" name="occupation" maxlength="128" value="{!! old('occupation', $user->occupation) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="site_url" class="col-md-2 control-label">Site Url </label>
                        <div class="col-md-4">
                            <input type="text" id="site_url" name="site_url" maxlength="128" value="{!! old('site_url', $user->site_url) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about_me" class="col-md-2 control-label">about_me </label>
                        <div class="col-md-4">
                            <input type="text" id="about_me" name="about_me" maxlength="128" value="{!! old('about_me', $user->about_me) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-md-2 control-label">Facebook </label>
                        <div class="col-md-4">
                            <input type="text" name="facebook" maxlength="128" value="{!! old('facebook', $user->facebook) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tumblr" class="col-md-2 control-label">Tumblr </label>
                        <div class="col-md-4">
                            <input type="text" name="tumblr" maxlength="128" value="{!! old('tumblr', $user->tumblr) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-md-2 control-label">Twitter </label>
                        <div class="col-md-4">
                            <input type="text" name="twitter" maxlength="128" value="{!! old('twitter', $user->twitter) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pinterest" class="col-md-2 control-label">Pinterest </label>
                        <div class="col-md-4">
                            <input type="text" name="pinterest" maxlength="128" value="{!! old('pinterest', $user->pinterest) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="col-md-2 control-label">Instagram </label>
                        <div class="col-md-4">
                            <input type="text" name="instagram" maxlength="128" value="{!! old('instagram', $user->instagram) !!}" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-md-2 control-label">Profile Image</label>
                        <div class="col-md-4">
                            <input type="hidden" name="previous_image" value="{!! $user->image !!}" class="form-control" />
                            <input type="file" name="image" class="form-control" />
                        </div>
                        @if ($user->image && file_exists(uploadsDir('users') . $user->image))
                            <div class="col-md-4">
                                <img width="120" src="{!! asset(uploadsDir('users') . $user->image) !!}">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-2 control-label">Status *</label>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-control js-example-basic-multiple">
                                @foreach (getStatus() as $status_id => $status_text)
                                   <option {!! ($user->status == $status_id) ? 'selected' : '' !!} value="{!! $status_id !!}">{!! $status_text !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" class="btn blue" id="save" value="Save">
                            <input type="button" class="btn black" name="cancel" id="cancel" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section('footer-js')
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/select2/select2.min.js') !!}"></script>
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! URL::to('assets/admin/scripts/core/app.js') !!}"></script>
<script src="{!! asset('assets/admin/scripts/custom/jquery.datetimepicker.full.js') !!}"></script>

<script>
$('#start_time').datetimepicker({
    minDate:0
});

$('#end_time').datetimepicker({
    onShow:function( ct ){
        this.setOptions({
            minDate:jQuery('#start_time').val()?jQuery('#start_time').val():false
        })
    }
});

jQuery(document).ready(function() {
    // initiate layout and plugins
    App.init();
    Admin.init();
    $('#cancel').click(function() {
        window.location.href = "{!! URL::route('admin.users.index') !!}";
    });

});
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@stop
