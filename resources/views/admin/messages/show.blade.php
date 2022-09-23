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

				<!-- begin widget-chat -->
				<div class="widget-chat widget-chat-rounded">
				  <!-- begin widget-chat-header -->
				  <div class="widget-chat-header">
					<div class="widget-chat-header-icon">
						@if ($messages->to_picture != '' && file_exists(uploadsDir("users") . $messages->to_picture))
                                    <img src="{!! asset(uploadsDir('users') . $messages->to_picture) !!}"  class="text-inverse text-center rounded-corner width-40 height-40" />
                        @endif
					</div>
				    <div class="widget-chat-header-content">
				      <h4 class="widget-chat-header-title">{!! $messages->to_fullname !!} </h4>
				      <p class="widget-chat-header-desc">
                        @if ($messages->to_user_type == '1')
                            Single User
                        @elseif ($messages->to_user_type == '2')
                            Channel Partner
                        @elseif ($messages->to_user_type == '3')
                            Distributor
                        @endif
                      </p>
				    </div>
				  </div>
				  <!-- end widget-chat-header -->
				  
				  <!-- begin widget-chat-body -->
				  <div class="widget-chat-body" data-scrollbar="true" data-height="400px">
				  	@foreach($messagedata as $key =>  $message)
				  	@if($message->from_id == $messages-> to_id)
					<div class="widget-chat-item with-media left">
						<div class="widget-chat-media">
								@if ($messages->to_picture != '' && file_exists(uploadsDir("users") . $messages->to_picture))
                                    <img src="{!! asset(uploadsDir('users') . $messages->to_picture) !!}" style="
								    max-width: fit-content !important; " />
                        		@endif
						</div>
						<div class="widget-chat-info">
							<div class="widget-chat-info-container">
								<div class="widget-chat-name text-indigo">{!! $message->from_fullname !!}</div>
								<div class="widget-chat-message">{!! $message->message !!}
								@if ($message->media != '' && file_exists(uploadsDir("messages") . $message->media))
                                     <a href="{!! asset(uploadsDir('messages') . $message->media) !!}" download>Attachment ({!! $message->media_size !!} MB)</a>
                        		@endif
                        	</div>
								<div class="widget-chat-time">{!! $message->latestCreatedAtFromat !!}</div>
							</div>
						</div>
					</div>
					@else

					<div class="widget-chat-item with-media right">
						<div class="widget-chat-media">
								@if ($messages->from_picture != '' && file_exists(uploadsDir("users") . $messages->from_picture))
                                    <img src="{!! asset(uploadsDir('users') . $messages->from_picture) !!}" style="
    								max-width: fit-content !important;" />
                        		@endif
						</div>
						<div class="widget-chat-info" style="margin-right: 53px !important;">
							<div class="widget-chat-info-container">
								<div class="widget-chat-name text-indigo">{!! $message->from_fullname !!}</div>
								<div class="widget-chat-message">{!! $message->message !!}
								@if ($message->media != '' && file_exists(uploadsDir("messages") . $message->media))
                                    <a href="{!! asset(uploadsDir('messages') . $message->media) !!}" download>Attachment ({!! $message->media_size !!} MB)</a>
                        		@endif
                        		</div>
								<div class="widget-chat-time">{!! $message->latestCreatedAtFromat !!}</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach

				    </div>

				  </div>
				  <!-- end widget-chat-body -->
				  
			<div class="invoice-note">
				<a href="{!! route('admin.messages.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection