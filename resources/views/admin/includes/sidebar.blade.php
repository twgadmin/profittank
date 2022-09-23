<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="{!! route('admin.dashboard.index') !!}">
					<div class="cover with-shadow"></div>
					<div class="image image-icon bg-black text-grey-darker">
						@if (auth::user()->picture != '' && file_exists(uploadsDir("admin") . auth::user()->picture))
                                    <img src="{!! asset(uploadsDir('admin') . auth::user()->picture) !!}"  class="text-inverse text-center rounded-corner width-40 height-40" />
                        @else
						<i class="fa fa-user"></i>
						@endif
					</div>
					<div class="info">
						<small>Welcome</small>
						{!! auth::user()->fullName() !!}
					</div>
				</a>
			</li>
		</ul>
		<ul class="nav">
			<!-- <li class="nav-header">Menu</li> -->
			<li class="">
				<a href="/admin/dashboard">
					<i class="fa fa-th-large"></i>
					<span>Dashboard</span>
				</a>	
			</li>
			<li class="has-sub {{ request()->segment(2) == 'administrators' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fas fa-user-secret"></i>
					<span>Administrators ({!! $adminsCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'administrators' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.administrators.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'administrators' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.administrators.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'users-login' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fas fa-user-secret"></i>
					<span>Users Login ({!! $usersLoginCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'users-login' ? 'active' : '' }}"><a href="{!! route('admin.users-login.index') !!}">List </a></li>
				</ul>
			</li>
			<li class="has-sub {{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 1) ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>Single Users ({!! $singleUsersCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 1) && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.create') !!}?user_type=1">Add new</a></li>
					<li class="{{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 1) && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.index') !!}?user_type=1">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 2) ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-user-plus"></i>
					<span>Channel Partners ({!! $channelUsersCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 2) && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.create') !!}?user_type=2">Add new</a></li>
					<li class="{{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 2) && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.index') !!}?user_type=2">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ (request()->segment(2) == 'users' && isset($_GET['user_type']) && $_GET['user_type'] == 3) ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span>Distributors ({!! $distributorUsersCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'users' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.create') !!}?user_type=3">Add new</a></li>
					<li class="{{ request()->segment(2) == 'users' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.users.index') !!}?user_type=3">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'revenue-engine' ? 'active' : '' }}">
				<a href="{!! route('admin.revenue-engine.index') !!}">
					<i class="far fa-money-bill-alt "></i>
					<span>Profit Generator ({!! $profitGeneratorCount !!})</span>
				</a>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'channels' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fas fa-desktop"></i>
					<span>Channels ({!! $channelsCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'channels' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.channels.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'channels' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.channels.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'plans' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-dollar-sign"></i>
					<span>Plans ({!! $plansCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'plans' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.plans.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'plans' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.plans.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'transactions' ? 'active' : '' }}">
				<a href="{!! route('admin.transactions.index') !!}">
					<i class="fa fa-table"></i>
					<span>Transactions ({!! $transactionsCount !!})</span>
				</a>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'messages' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-envelope"></i>
					<span>Messages ({!! $messageCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'messages' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.messages.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'messages' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.messages.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'notifications' ? 'active' : '' }}">
				<a href="{!! route('admin.notifications.index') !!}">
					<i class="far fa-bell"></i>
					<span>Notifications ({!! $notificationsCount !!})</span>
				</a>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'media-files' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-bars"></i>
					<span>Media Files ({!! $mediaFilesCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'media-files' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.media-files.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'media-files' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.media-files.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'pages' ? 'active' : '' }}">
				<a href="javascript:;">
					<i class="fa fa-file-alt"></i>
					<span>Pages ({!! $pagesCount !!})</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ request()->segment(2) == 'pages' && request()->segment(3) == 'create' ? 'active' : '' }}"><a href="{!! route('admin.pages.create') !!}">Add new</a></li>
					<li class="{{ request()->segment(2) == 'pages' && request()->segment(3) != 'create' ? 'active' : '' }}"><a href="{!! route('admin.pages.index') !!}">List</a></li>
				</ul>
			</li>
			<li class="has-sub {{ request()->segment(2) == 'site_settings' ? 'active' : '' }}">
				<a href="{!! route('admin.site_settings.index') !!}">
					<i class="fa fa-tools"></i>
					<span>Site Settings</span>
				</a>
			</li>
			<li>
				<a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
					<i class="fa fa-angle-double-left"></i>
				</a>
			</li>
		</ul>
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

