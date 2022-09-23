@extends('admin.layouts.default')

@section('title', 'Page Details')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.media-files.index') !!}">Page</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>Page Details</small></h1>
<div class="invoice">
			<!-- begin invoice-company -->
			<div class="invoice-company">
				<span class="pull-right hidden-print">
					<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
				</span>
				Details
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Page Title:</strong><br />
								{!! $data->page_title !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Slug:</strong><br />
								{!! $data->slug !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Content:</strong><br />
								{!! $data->content !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Meta Title:</strong><br />
								{!! $data->meta_title !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Meta Keywords:</strong><br />
								{!! $data->meta_keywords !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Meta Description:</strong><br />
								{!! $data->meta_description !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">File :</strong><br />
	                            <input type="text" name="file" value="{!! old('file', $media_file_data->filename) !!}" maxlength="340" class="form-control" style="display: none;" />
	                            @if ($media_file_data->filename != '' && file_exists(uploadsDir('media_files') . $media_file_data->filename))
	                                <br><img src="{!! asset(uploadsDir('media_files') . $media_file_data->filename) !!}" width="220px" />
	                            @endif
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.pages.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection