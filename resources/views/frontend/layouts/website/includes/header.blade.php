<header class="fixed">
	<div class="main-header">
		<div class="container">
			<div class="menu-Bar">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="row align-items-center justify-content-between">
				<div class="col-auto">
					@if (auth()->check() && auth()->user()->user_type == 1)
						<a href="{!! route('index') !!}" class="logo">
					@elseif (auth()->check() && auth()->user()->user_type == 2)
						<a href="{!! route('channel-dashboard') !!}" class="logo">
					@elseif (auth()->check() && auth()->user()->user_type == 3)
						<a href="{!! route('distributor') !!}" class="logo">
					@else
						<a href="javascript:;" class="logo">
					@endif
					<?php /* <img src="{!! asset('assets/frontend/website/assets/images/logo.png') !!}" alt="">*/ ?>
					</a>
				</div>
				<div class="col-auto">
					<div class="row">
						<div class="col-auto">
							<div class="menuWrap">
								<ul class="menu">
									<li>
										<div class="fld-search">
											<input type="text" name="" placeholder="Search">
											<button type="submit">
												<img src="{!! asset('assets/frontend/website/assets/images/icons/icon-search.png') !!}"/></button>
										</div>
									</li>
									<li><a href="#" class="showhide"><span><img src="{!! asset('assets/frontend/website/assets/images/icons/icon-chat.png') !!}"/></span></a>
										<ul class="dropdown messages-dropdown" style="display: none;">
											@if ($messagesCount && $messagesCount > 0)
												@foreach ($userMessages as $key => $message)
													<li style="padding: 5px;">
														<a href="{!! route('messages', [base64_encode($message->from_user_id), Str::slug($message->from_user_first_name. ' ' .  $message->from_user_last_name)]) !!}">
															@if (isset($message->from_user_profile) && file_exists(uploadsDir('users') . $message->from_user_profile))
																<figure class="profile-fig">
																	<img src="{!! asset(uploadsDir('users').$message->from_user_profile)  !!} " class="profile-img">
																</figure>
															@else
																<figure class="profile-fig">
																	<img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}" class="profile-img">
																</figure>
															@endif
														<p>{!! $message->message  !!}</p>
														</a>
													</li>
												@endforeach

												<a href="{!! route('messages') !!}" class="btn-theme">
													See All Message
												</a>

											@else
												<p>No any message</p>
											@endif
										</ul>
									</li>
									<li><a href="#" class="showhide"><span><img src="{!! asset('assets/frontend/website/assets/images/icons/icon-notification.png') !!}"/></span></a>
										<ul class="dropdown" style="display: none;">
											<p>No any notification</p>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-auto">
							<div class="user-profile">
								<a href="#" class="showhide">{!! (auth()->check()) ? auth()->user()->first_name . ' ' . auth()->user()->last_name:""   !!} 
									<span><img src="{!! asset('assets/frontend/website/assets/images/icons/caret.svg') !!}"/></span>

									@if (isset(auth()->user()->image) && file_exists(uploadsDir('users') . auth()->user()->image))
										<figure><img src="{!! asset(uploadsDir('users').auth()->user()->image)  !!} " ></figure>
									@else
										<figure ><img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}" ></figure>
									@endif
									<!-- <figure><img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"></figure> -->
								</a>

								<ul class="dropdown profile-dropdown" style="display: none;">
									@if(auth()->user() && auth()->user()->expiry_date != '' && auth()->user()->expiry_date != '' && auth()->user()->expiry_date > date("Y-m-d H:i:s"))
										<li>{{ __('Plan Expiry :date', ['date' => date('M d, Y', strtotime(auth()->user()->expiry_date))]) }}</li>
									@endif
									<li><a href="{!! route('welcome') !!}">Dashboard</a></li>
									<li><a href="{!! route('profile') !!}">My Account</a></li>
									<li><a href="{!! route('subscriptions') !!}">Subscriptions</a></li>
									<li><a href="{!! route('update-card') !!}">Update Card</a></li>
									<li><a href="{!! route('transactions') !!}">Transactions</a></li>
									<li><a href="#">Settings</a></li>
									<li><a href="javascript:;" onclick="logout()">Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>