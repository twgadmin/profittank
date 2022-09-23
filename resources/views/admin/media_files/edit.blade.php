@extends('admin.layouts.default')

@section('title', 'Edit Media File')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.media-files.index') !!}">Edit Media file</a></li>
	<li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>Edit Media file</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Media file</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">

                @include('admin.partials.errors')
                
                <!-- body content -->
                <form action="{!! route('admin.media-files.update', $data->id) !!}" method="POST" role="form"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                         <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">Alternate Text* </label>
                            <input class="form-control" type="text" value="{!! old('alt_text', $data->alt_text) !!}" name="alt_text" id="alt_text" placeholder="Alternate Text">
                        </div>
                       
                        <div class="col-xl-6 panel-body">
                            <label for="image" class="control-label">Media File*</label>
                            <input type="file" name="file" class="form-control" />
                           
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone">Caption*</label>
                            <input class="form-control" type="text" value="{!! old('caption', $data->caption) !!}" name="caption" id="caption" placeholder="Caption">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" name="filename" value="{!! old('filename', $data->filename) !!}" maxlength="128" class="form-control" style="display: none;" />
                            @if ($data->filename != '' && file_exists(uploadsDir('media_files') . $data->filename))
                                <br><img src="{!! asset(uploadsDir('media_files') . $data->filename) !!}" width="100px" />
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