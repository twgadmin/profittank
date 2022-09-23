@extends('admin.layouts.default')

@section('title', 'Dashboard V3')

@section('content')
<ol class="breadcrumb float-xl-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	<li class="breadcrumb-item"><a href="{!! route('admin.administrators.index') !!}">Channel</a></li>
	<li class="breadcrumb-item active">Details </li>
</ol>
<h1 class="page-header"><small>CHANNEL</small></h1>
<div class="invoice">
			<!-- begin invoice-company -->
			<div class="invoice-company">
				<span class="pull-right hidden-print">
					<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
				</span>
				Channel Details
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Channel Partner</strong><br />
								@if ($channel->channel_partner_id != 0)
                                {!! $channel->channel_partner_first_name . ' - ' . $channel->channel_partner_last_name !!}
                                @endif
                                <br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Channel Name</strong><br />
								{!! $channel->name !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Channel Identifier</strong><br />
								{!! $channel->identifier !!}<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Channel Description</strong><br />
								{!! $channel->description !!}<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">User Completion Time</strong><br />
								{!! $channel->user_completion_time !!} minutes<br />
							</span>
						</div>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Estimated Turnaround Time</strong><br />
								{!! $channel->estimate_turnaround_time !!} Business Day<br />
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Video Cover</strong><br />           
                                @if ($channel->video_cover && file_exists(uploadsDir('channels') . $channel->video_cover))
                                    <img width="350" height="200" src="{!! asset(uploadsDir('channels').$channel->video_cover) !!}">
                                @endif
								<br />
							</span>
						</div>
						<?php
						$string = $channel->video_url;
						$replace = array("https://www.youtube.com/watch?v=","&ab_channel=CandRfun");
						$url = str_replace($replace,"",$string);
						?>
						<div class="invoice-from">
							<span class="m-t-5 m-b-5">
								<strong class="text-inverse">Video URL</strong><br />
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!! $url !!}"width="350" height="200" ></iframe>
								<br />
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="invoice-note">
				<a href="{!! route('admin.channels.index') !!}" class="btn btn-md btn-inverse">Back</a>
			</div>
		</div>
@endsection
