@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
@section('css')
<link href="{!! URL::to('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" />
@endsection
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Channel</a></li>
    <li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>CHANNEL</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Channel</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="panel-body">
                
                @include('admin.partials.errors')
                <!-- body content -->
                <form action="{!! route('admin.channels.update', $data->id) !!}"  method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="channel_partner_id">Channel Partner</label>
                            <select name="channel_partner_id" class="default-select2 form-control">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id !!}" {!! matchSelected($data->channel_partner_id, $user->id) !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="name">Channel Name</label>
                            <input class="form-control" type="text" value="{!! old('name', $data->name) !!}" name="name" id="name" placeholder="Channel name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="video_cover">Video Cover</label>
                            <input class="form-control" type="file" value="{!! old('video_cover', $data->video_cover) !!}" name="video_cover" id="video_cover" placeholder="image">
                            <input type="hidden" name="previous_image" value="{!! $data->video_cover !!}" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="identifier">Channel Identifier</label>
                            <input class="form-control" type="text" value="{!! old('identifier', $data->identifier) !!}" name="identifier" id="identifier" placeholder="Channel-Identifier">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="user_completion_time">User Completion Time</label>
                            <input class="form-control" type="number" value="{!! old('user_completion_time', $data->user_completion_time) !!}" name="user_completion_time" id="user_completion_time" placeholder="0 Minutes" min="0">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="estimate_turnaround_time">Estimated Turnaround Time</label>
                            <input class="form-control" type="number" value="{!! old('estimate_turnaround_time', $data->estimate_turnaround_time) !!}" name="estimate_turnaround_time" id="estimate_turnaround_time" placeholder="0 Bussiness Days" min="0">
                        </div>
                        <div class="col-xl-12 panel-body">
                            <label class="form-label" for="video_url">Video URL</label>
                            <input class="form-control" type="link" value="{!! old('video_url', $data->video_url) !!}" name="video_url" id="video_url" placeholder="Youtube URL">
                        </div>
                        <div class="col-xl-12 panel-body">
                            <label class="form-label" for="description">Channel Description</label>
                            <textarea class="textarea form-control" id="wysihtml5" name="description" placeholder="Enter Description ..." >{!! old('description', $data->description) !!}</textarea>
                        </div>

                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.channels.index') !!}'" class="btn btn-black w-100px me-5px">Back</button>

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
<script type="text/javascript">
$("#name" ).blur(function() {
    var value = $( this ).val();
    $('#identifier').val(slugify(value));
}).blur();

function slugify(text)
{
  return text.toString().toLowerCase()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}
<script type="text/javascript"> 
$(document).ready(function() {
    $('.default-select2').select2();
});
</script>
</script>
<script src="{!! URL::to('assets/js/app.min.js') !!}"></script>
<script src="{!! URL::to('assets/js/theme/default.min.js') !!}"></script>
<script src="{!! URL::to('assets/plugins/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! URL::to('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<script src="{!! URL::to('assets/js/demo/form-wysiwyg.demo.js') !!}"></script>
@endsection