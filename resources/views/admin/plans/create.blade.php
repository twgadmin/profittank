@extends('admin.layouts.default')
@section('title', 'Plans')
@section('content')
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="{!! route('admin.plans.index') !!}">Plans</a></li>
    <li class="breadcrumb-item active">Create </li>
</ol>
<h1 class="page-header"><small>Plans</small></h1>
<div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
    <div class="col-xl-12 ui-sortable">

                @include('admin.partials.errors')
                
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Add Plans</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <!-- body content -->
                <form action="{!! route('admin.plans.store') !!}" method="POST" role="form">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="plan_name">Plan Name </label>
                            <input type="text" id="plan_name" name="plan_name" value="{!! old('plan_name') !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="sub_heading">Sub Heading </label>
                            <input type="text" id="sub_heading" name="sub_heading" value="{!! old('sub_heading') !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="monthly_price">Monthly Price</label>
                            <input type="number" step=".01" id="monthly_price" name="monthly_price" value="{!! old('monthly_price') !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="additional_price">Additional Price</label>
                            <input type="number" step=".01" id="additional_price" name="additional_price" value="{!! old('additional_price') !!}" class="form-control" />
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="ckeditor " id="description" name="description" rows="20">{!! old('description') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <div>
                                <label class="form-label">Is active</label>
                            </div>
                            <div class="switcher mt-2" >
                                <input type="checkbox" name="is_active" id="switcher_checkbox_1" data-toggle="toggle" data-style="ios slow" data-on="1" data-off="0" data-onstyle="success" data-offstyle="danger">
                                <label for="switcher_checkbox_1"></label>
                            </div>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="short_description">Short Description</label>
                            <textarea class="ckeditor " id="short_description" name="short_description" rows="20">{!! old('short_description') !!}</textarea>
                        </div>
                        <div class="col-xl-6 panel-body">
                            <label class="form-label" for="detail_description">Detail Description</label>
                            <textarea class="ckeditor " id="detail_description" name="detail_description" rows="20">{!! old('detail_description') !!}</textarea>
                        </div>
                        <div class="col-xl-12">
                            <hr>
                            <button type="button" onclick="window.location.href = '{!! route('admin.plans.index') !!}'" class="btn btn-black w-100px me-5px">Back</button>

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