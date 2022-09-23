@extends('admin.layouts.default')

@section('title', 'Site Settings')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item active" ><a href="{!! route('admin.media-files.index') !!}">Edit Site Settings</a></li>
</ol>
<h1 class="page-header"><small>Site Settings</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">

        @include('admin.partials.errors')

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Site Settings</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
                <!-- body content -->
                <form action="{!! route('admin.site_settings.update', $data->id) !!}" method="POST" role="form"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                         <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">Site Title</label>
                            <input class="form-control" type="text" value="{!! old('site_title', $data->site_title) !!}" name="site_title" id="site_title" placeholder="Site Title">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Contact Email</label>
                            <input class="form-control" type="text" value="{!! old('contact_email', $data->contact_email) !!}" name="contact_email" id="contact_email" placeholder="Contact Email">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Contact Phone</label>
                            <input class="form-control" type="text" value="{!! old('contact_phone', $data->contact_phone) !!}" name="contact_phone" id="contact_phone" placeholder="Contact Phone">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Contact Skype</label>
                            <input class="form-control" type="text" value="{!! old('contact_skype', $data->contact_skype) !!}" name="contact_skype" id="contact_skype" placeholder="Contact Skype">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Address</label>
                            <input class="form-control" type="text" value="{!! old('address', $data->address) !!}" name="address" id="address" placeholder="Address">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Facebook</label>
                            <input class="form-control" type="text" value="{!! old('facebook', $data->facebook) !!}" name="facebook" id="facebook" placeholder="Facebook ID">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Twitter</label>
                            <input class="form-control" type="text" value="{!! old('twitter', $data->twitter) !!}" name="twitter" id="twitter" placeholder="Twitter">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Pinterest</label>
                            <input class="form-control" type="text" value="{!! old('pinterest', $data->pinterest) !!}" name="pinterest" id="pinterest" placeholder="Pinterest">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Youtube</label>
                            <input class="form-control" type="text" value="{!! old('youtube', $data->youtube) !!}" name="youtube" id="youtube" placeholder="Youtube">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Footer Scripts</label>
                            <input class="form-control" type="text" value="{!! old('footer_scripts', $data->footer_scripts) !!}" name="footer_scripts" id="footer_scripts" placeholder="Footer Scripts">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Footer Sentence</label>
                            <input class="form-control" type="text" value="{!! old('footer_sentence', $data->footer_sentence) !!}" name="footer_sentence" id="footer_sentence" placeholder="Footer Sentence">
                        </div>
                        <div class="col-xl-6  panel-body">
                            <label class="form-label" for="phone">Copyright</label>
                            <input class="form-control" type="text" value="{!! old('copyright', $data->copyright) !!}" name="copyright" id="copyright" placeholder="Copyright">
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="col-md-2 control-label">Site Logo</label>
                            <input type="file" name="logo" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="previous_logo" value="{!! old('filename', $data->logo) !!}" maxlength="128" class="form-control" style="display: none;" />
                            @if ($data->logo != '' && file_exists(uploadsDir('front') . $data->logo))
                                <br><img src="{!! asset(uploadsDir('front') . $data->logo) !!}" width="100px" />
                            @endif
                        </div>
                           
                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.media-files.index') !!}'" class="btn btn-black w-100px me-5px">Back</button>

                            <button type="submit" class="btn btn-success w-100px me-5px">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection