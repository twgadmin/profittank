@extends('admin.layouts.default')

@section('title', 'Media File Details')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.media-files.index') !!}">Media Files</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>Media File Details</small></h1>
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
								<strong class="text-inverse">Alternate Text:</strong><br />
								{!! $data->alt_text !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Caption</strong><br />
								{!! $data->caption !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">File :</strong><br />
	                            <input type="text" name="file" value="{!! old('filename', $data->filename) !!}" maxlength="340" class="form-control" style="display: none;" />
	                            @if ($data->filename != '' && file_exists(uploadsDir('media_files') . $data->filename))
	                                <br><img src="{!! asset(uploadsDir('media_files') . $data->filename) !!}" width="320px" />
	                            @endif
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.media-files.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection