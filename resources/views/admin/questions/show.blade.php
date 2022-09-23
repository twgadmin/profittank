@extends('admin.layouts.default')

@section('title', 'Add Questions')

@section('content')
	<!-- begin page-header -->
	<h1 class="page-header">Test Query

    </h1>
	<!-- end page-header -->

    <div class="row mb-3">
        <!-- col-xl-6 1 starts here  -->
      <div class="col-xl-6 ui-sortable">
	 <!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">PROFIT INCREASE</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
		
		

		 @foreach($questions_category as $d)
	      @if($d->question_category == 'We hire employees')
	       @foreach($questions as $d2)
					<td>{{$d2->questions}}</td>
		  @endforeach
            @else
		 	Coundtion false
		 @endif
		@endforeach 
	

		  </div>
     	</div>
	  <!-- end panel -->
      </div>
     <!-- col-xl-6 1 end  -->
    </div>
@endsection