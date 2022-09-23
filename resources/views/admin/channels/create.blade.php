@extends('admin.layouts.default')
@section('title', 'Add Channel')
@section('content')
@section('css')
<link href="{!! URL::to('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" />
@endsection
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Channel</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<h1 class="page-header"><small>CHANNEL</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Channel</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">
               
                @include('admin.partials.errors')
                <!-- body content -->
                <form action="{!! route('admin.channels.store') !!}"  method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="channel_partner_id">Channel Partner</label>
                            <select name="channel_partner_id" class="default-select2 form-control">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id !!}" >{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="name">Channel Name</label>
                            <input class="form-control" value="{!! old('name') !!}" type="text" name="name" id="name" placeholder="Channel name">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="video_cover">Video Cover</label>
                            <input class="form-control" value="{!! old('video_cover') !!}" type="file" name="video_cover" id="video_cover" placeholder="Email">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="identifier">Channel Identifier</label>
                            <input class="form-control" value="{!! old('identifier') !!}" type="text" name="identifier" id="identifier" placeholder="Channel-Identifier">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="user_completion_time">User Completion Time</label>
                            <input class="form-control" value="{!! old('user_completion_time') !!}" type="number" name="user_completion_time" id="user_completion_time" placeholder="0 Minutes" min="0">
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="estimate_turnaround_time">Estimated Turnaround Time</label>
                            <input class="form-control" value="{!! old('estimate_turnaround_time') !!}" type="number" name="estimate_turnaround_time" id="estimate_turnaround_time" placeholder="0 Bussiness Days" min="0">
                        </div>
                        <div class="col-xl-12 panel-body">
                            <label class="form-label" for="video_url">Video URL</label>
                            <input class="form-control" value="{!! old('video_url') !!}" type="link" name="video_url" id="video_url" placeholder="Youtube URL">
                        </div>
                        <div class="col-xl-12 panel-body ">
                            <label class="form-label" for="description">Channel Description</label>
                            <textarea class="textarea form-control" id="wysihtml5" name="description" placeholder="Enter Description ..." >{!! old('description') !!}</textarea>
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
<script src="{!! URL::to('assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<script src="{!! URL::to('assets/js/demo/form-wysiwyg.demo.js') !!}"></script>
@endsection