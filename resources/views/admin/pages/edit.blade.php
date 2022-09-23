@extends('admin.layouts.default')

@section('title', 'Edit MEDIA file')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Edit MEDIA file</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.media-files.index') !!}">Edit Media file</a></li>
	<li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>Edit MEDIA file</small></h1>
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
                <form action="{!! route('admin.pages.update', $data->id) !!}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                          <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">Page Title *</label>
                            <input class="form-control" type="text" name="page_title" value="{!! old('page_title', $data->page_title) !!}" id="page_title" placeholder="Page Title">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="last_name">Slug *</label>
                            <input class="form-control" type="text" name="slug" value="{!! old('slug', $data->slug) !!}" id="slug" placeholder="Slug">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Meta Title *</label>
                            <input class="form-control" type="text" name="meta_title" value="{!! old('meta_title', $data->meta_title) !!}" id="meta_title" placeholder="Meta Title">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Meta Keywords</label>
                            <textarea class="form-control " id="meta_keywords" name="meta_keywords" value="{!! old('meta_keywords', $data->meta_keywords) !!}" rows="1"> {!! $data->meta_keywords !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="email">Meta Description</label>
                            <textarea class="textarea form-control" style="height: 180px; resize: none;" name="meta_description" id="meta_description">{!! old('meta_description', $data->meta_description) !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="last_name">Media File *</label>
                            <a href="{!! route('admin.media-files.create') !!}" class="">Add new media file</a>
                            <br>
                            <div class="row" style="max-height: 200px; overflow-y: scroll;">
                                @foreach ($mediaFile as $key => $record)
                                    <div class="col-xl-4 col-md-4 col-xs-6" style="padding: 5px;">
                                        <input type="radio" name="media_file_id" value="{!! $record->id !!}" {{ $data->media_file_id == $record->id ? 'Checked' : '' }}>
                                        <img src="{!! asset(uploadsDir('media_files') . $record->filename) !!}" style="height: 80px; width: 135px;" class="img-fluid" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label" for="phone">Content</label>
                            <textarea class="ckeditor " id="content" name="content" rows="20" value="{!! old('content', $data->content) !!}">{!! old('content', $data->content) !!}</textarea>
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
@section('js')
<script src="{!! URL::to('assets/plugins/ckeditor/ckeditor.js') !!}"></script>
@endsection