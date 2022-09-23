@extends('admin.layouts.default')
@section('title', 'Add Media File')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.media-files.index') !!}"> Media File</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Add Media File</h1>
<!-- end page-header -->
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Media File</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">

                @include('admin.partials.errors')
                
                <!-- body content -->
                <form action="{!! route('admin.media-files.store') !!}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="alternate_text">Alternate Text *</label>
                            <input class="form-control" type="text" value="{!! old('alt_text') !!}" name="alt_text" placeholder="Alternate Text">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="media_file">Media File*</label>
                            <input class="form-control" type="file" name="file">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="caption">Caption *</label>
                            <input class="form-control" type="text" value="{!! old('caption') !!}" name="caption" placeholder="Caption">
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