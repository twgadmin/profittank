@extends('admin.layouts.default')
@section('title', 'Add Message')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.messages.index') !!}"> Message</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<!-- begin page-header -->
<h1 class="page-header">Add Message</h1>
<!-- end page-header -->
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Message</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
    		<div class="panel-body">

                @include('admin.partials.errors')
                
                <!-- body content -->
                <form action="{!! route('admin.messages.store') !!}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">To *</label>
                            <select name="to_id" class="default-select2 form-control">
                                @foreach ($users as $user)
                                    <option value="{!! $user->id !!}" {!! ($user->id == old('to_id')) ? 'Selected' : ''  !!}>{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="first_name">From *</label>
                            <select name="from_id" class="default-select2 form-control">
                                 @foreach ($users as $user)
                                    <option value="{!! $user->id !!}"  {!! ($user->id == old('from_id')) ? 'Selected' : ''  !!} >{!! $user->first_name . ' - ' . $user->email !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="phone">Message*</label>
                             <textarea class="ckeditor " id="message" name="message" rows="10">{!! old('message') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label for="image" class="control-label">Media File</label>
                            <input type="file" name="file" maxlength="128" class="form-control" />
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
<script type="text/javascript"> 
$(document).ready(function() {
    $('.default-select2').select2();
});
</script>
@endsection