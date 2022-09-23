@extends('admin.layouts.default')
@section('title', 'Add Page')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.pages.index') !!}">Pages</a></li>
    <li class="breadcrumb-item active">Create page</li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Add Page</h1>
<!-- end page-header -->
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Page</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
               
                @include('admin.partials.errors')

                <!-- body content -->
                <form action="{!! route('admin.pages.store') !!}" method="POST" role="form">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="page_title">Page Title *</label>
                            <input class="form-control" value="{!! old('page_title') !!}" type="text" name="page_title" id="page_title" placeholder="Page Title">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="slug">Slug *</label>
                            <input class="form-control" type="text" value="{!! old('slug') !!}" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="meta_title">Meta Title *</label>
                            <input class="form-control" type="text" value="{!! old('meta_title') !!}" name="meta_title" id="meta_title" placeholder="Meta Title">
                        </div>

                        <div class="col-xl-6">
                            <label class="form-label" for="email">Meta Keywords</label>
                            <textarea class="form-control " id="meta_keywords" name="meta_keywords" rows="1" placeholder="Meta Keywords">{!! old('meta_keywords') !!}</textarea>
                        </div>

                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="meta_description">Meta Description</label>
                            <textarea class="textarea form-control" style="height: 180px; resize: none;" name="meta_description" id="meta_description">{!! old('meta_description') !!}</textarea>
                        </div>

                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="meta_file">Media File *</label>
                            <a href="{!! route('admin.media-files.create') !!}" class="">Add new media file</a>
                            <br>
                            <div class="row" style="max-height: 200px; overflow-y: scroll;">
                                @foreach ($mediaFile as $key => $record)
                                    <div class="col-xl-4 col-md-4 col-xs-6" style="padding: 5px;">
                                        <input class="" type="radio" name="media_file_id" value="{!! $record->id !!}" placeholder="">
                                        <img src="{!! asset(uploadsDir('media_files') . $record->filename) !!}" style="height: 80px; width: 135px;" class="img-fluid" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label" for="phone">Content</label>
                            <textarea class="ckeditor" id="content" name="content" rows="20">{!! old('content') !!}</textarea>
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
<script src="{!! URL::to('assets/plugins/ckeditor/ckeditor.js') !!}"></script>
<script>
    $("#page_title").blur(function()
        {
            var value = $(this).val();
            $("#slug").val(slugify(value));
        }).blur();
    function slugify(text){
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }
</script>
@endsection