@extends('admin.layouts.app')

@section('css')
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
        <h3 class="page-title">Add User <small></small></h3>
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
                    <i class="fa fa-plus"></i> Add User
                </div>
            </div>

            <div class="portlet-body">

                <h4>&nbsp;</h4>

                <form method="POST" action="{!! route('admin.users.store') !!}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="first_name" class="col-md-2 control-label">First Name *</label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('first_name') !!}" id="first_name" maxlength="50" name="first_name" class="form-control" />
                        </div>
                        <label for="last_name" class="col-md-2 control-label">Last Name </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('last_name') !!}" id="last_name" maxlength="50" name="last_name"  class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth" class="col-md-2 control-label">Date Of Birth</label>
                        <div class="col-md-4">
                            <input type="date" value="{!! old('date_of_birth') !!}" id="date_of_birth" name="date_of_birth" class="form-control" />
                        </div>
                        <label for="gender" class="col-md-2 control-label">Gender *</label>
                        <div class="col-md-4">
                            <select name="gender" id="gender" class="form-control js-example-basic-multiple">
                                @foreach (getGender() as $gender_id => $gender_text)
                                   <option  {!! ($gender_id==old('gender')) ? 'selected' : '' !!} value="{!! $gender_id !!}">{!! $gender_text !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location" class="col-md-2 control-label">Location</label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('location') !!}" id="location" maxlength="128" name="location" class="form-control" />
                        </div>
                        <label for="country_id" class="col-md-2 control-label">Country *</label>
                        <div class="col-md-4">
                            <select name="country_id" id="country_id" class="form-control js-example-basic-multiple">
                                @foreach($countries as $country)
                                    <option {!! ($country->id==old('country_id')) ? 'selected' : '' !!} value="{!! $country->id !!}">{!! $country->name !!}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="occupation" class="col-md-2 control-label">Occupation</label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('occupation') !!}" id="occupation" maxlength="50" name="occupation" class="form-control" />
                        </div>
                        <label for="email" class="col-md-2 control-label">Email *</label>
                        <div class="col-md-4">
                            <input type="email" id="email" value="{!! old('email') !!}" maxlength="50" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">Password *</label>
                        <div class="col-md-4">
                            <input type="password" value="{!! old('password') !!}" id="password" name="password" class="form-control">
                        </div>
                        <label for="password_confirmation" class="col-md-2 control-label">Confirm Password *</label>
                        <div class="col-md-4">
                            <input type="password" value="{!! old('password_confirmation') !!}" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-md-2 control-label">Facebook </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('facebook') !!}" id="facebook" name="facebook" class="form-control">
                        </div>
                        <label for="tumblr" class="col-md-2 control-label">Tumblr </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('tumblr') !!}" id="tumblr" name="tumblr" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="twitter" class="col-md-2 control-label">Twitter </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('twitter') !!}" id="twitter" name="twitter" class="form-control">
                        </div>
                        <label for="pinterest" class="col-md-2 control-label">Pinterest </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('pinterest') !!}" id="pinterest" name="pinterest" class="form-control">
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="col-md-2 control-label">Instagram </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('instagram') !!}" id="instagram" name="instagram" class="form-control">
                        </div>
                        <label for="site_url" class="col-md-2 control-label">Site Url </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('site_url') !!}" id="site_url" name="site_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about_me" class="col-md-2 control-label">Bio </label>
                        <div class="col-md-4">
                            <input type="text" value="{!! old('about_me') !!}" id="about_me" name="about_me" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-md-2 control-label">Profile Image</label>
                        <div class="col-md-4">
                            <input type="file" value="{!! old('image') !!}" id="image" name="image" class="form-control">
                        </div>
                        <label for="status" class="col-md-2 control-label">Status </label>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-control js-example-basic-multiple">
                                @foreach (getStatus() as $status_id => $status_text)
                                   <option  {!! ($status_id==old('status')) ? 'selected' : '' !!} value="{!! $status_id !!}">{!! $status_text !!}</option>
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/select2/select2.min.js') !!}"></script>

<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/ckeditor/ckeditor.js') !!}"></script>

<script src="{!! URL::to('assets/admin/scripts/core/app.js') !!}"></script>
<script>
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
