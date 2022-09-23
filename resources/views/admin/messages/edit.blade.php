@extends('admin.layouts.default')

@section('title', 'Edit Media File')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.messages.index') !!}">Messages</a></li>
	<li class="breadcrumb-item active">Edit </li>
</ol>
<h1 class="page-header"><small>Edit Messages</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Messages</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">

                @include('admin.partials.errors')
                
                <!-- body content -->
                <form action="{!! route('admin.messages.update', $data->id) !!}" method="POST" role="form"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">To </label>
                            <select name="to_id" class="default-select2 form-control">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id !!}" {!! matchSelected($data->to_id, $user->id) !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">From </label>
                            <select name="from_id" class="default-select2 form-control">
                                 @foreach ($users as $user)
                                    <option value="{!! $user->id !!}" {!! matchSelected($data->from_id, $user->id) !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone">Message*</label>
                             <textarea class="ckeditor " id="message" name="message" rows="10" value="{!! old('message', $data->message) !!}">{!! old('message', $data->message) !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label for="image" class="control-label">Media File*</label>
                            <input type="file" name="file" maxlength="128" class="form-control" />
                            <input type="text" name="media" value="{!! old('media', $data->media) !!}" maxlength="128" class="form-control" style="display: none;" />
                            @if ($data->media != '' && file_exists(uploadsDir('messages') . $data->media))
                               <br> <a href="{!! asset(uploadsDir('messages') . $data->media) !!}" download>Attachment ({!! $data->media_size !!} MB)</a>
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
@section('js')
<script src="{!! URL::to('assets/plugins/ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript"> 
$(document).ready(function() {
    $('.default-select2').select2();
});
</script>
@endsection