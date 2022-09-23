@extends('admin.layouts.default')
@section('title', 'Add Questions')
@section('content')
 <!-- begin page-header -->
 <h1 class="page-header">User Questions</h1>
 <!-- end page-header -->
 <div class="row mb-3">
    <!-- col-xl-6 1 starts here  -->
      <div class="col-xl-6 ui-sortable">
    <!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Add Questions</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
		  <!-- body content -->
             <form action="{{ url('ajaxGetCategories') }}" method="POST" role="form">
			 @csrf
             @method('POST')
              <fieldset>
                <div class="mb-3">
                    <label class="form-label" for="Questions"></label>
                    <input class="form-control" type="text" name="questions" id="Questions" placeholder="Questions ?">
                </div>
                <button type="submit" class="btn btn-primary w-100px me-5px">Create</button>
             </fieldset>
             </form>
             <!-- end  -->
		  </div>
     	</div>
	   <!-- end panel -->
      </div>
     <!-- col-xl-6 1 end  -->
    </div>
@endsection