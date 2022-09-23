<!-- begin #header -->
<div id="header" class="header navbar-default">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle pull-left" data-click="right-sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="#" class="navbar-brand">
			@if ($siteSettings->logo != '' && file_exists(uploadsDir('front') . $siteSettings->logo))
				<?php /*<img src="{!! asset(uploadsDir('front') . $siteSettings->logo) !!}" />*/ ?>
			@else
				<?php /* <img src="{!! asset('assets/frontend/logo.png') !!}" />*/ ?>
			@endif
		</a>
		<button type="button" class="navbar-toggle pt-0 pb-0 mr-0" data-toggle="collapse" data-target="#top-navbar">
			<span class="fa-stack fa-lg text-inverse">
				<i class="far fa-square fa-stack-2x"></i>
				<i class="fa fa-cog fa-stack-1x"></i>
			</span>
		</button>

		<button type="button" class="navbar-toggle pt-0 pb-0 mr-0 collapsed" data-click="top-menu-toggled">
			<span class="fa-stack fa-lg text-inverse">
				<i class="far fa-square fa-stack-2x"></i>
				<i class="fa fa-cog fa-stack-1x"></i>
			</span>
		</button>

		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

	</div>
	<!-- end navbar-header -->
	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<!-- <li class="navbar-form">
			<form action="" method="POST" name="search_form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter keyword" />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li> -->
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
				<i class="fa fa-bell"></i>
				<span class="label">0</span>
			</a>
			<div class="dropdown-menu media-list dropdown-menu-right">
				<div class="dropdown-header">NOTIFICATIONS (0)</div>
				<div class="text-center width-300 p-b-10 p-t-10">
					No notification found
				</div>
			</div>
		</li>
		<li class="dropdown navbar-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<div class="image image-icon bg-black text-grey-darker">
					@if (auth::user()->picture != '' && file_exists(uploadsDir("admin") . auth::user()->picture))
                        <img src="{!! asset(uploadsDir('admin') . auth::user()->picture) !!}"  class="text-inverse text-center rounded-corner width-40 height-40" />
                    @else
						<i class="fa fa-user"></i>
					@endif
				</div>
				<span class="d-none d-md-inline">{{ Auth::user()->fullName() }}</span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="{!! route('admin.edit-profile') !!}" class="dropdown-item">Edit Profile</a>
				<a href="javascript:;" class="dropdown-item">Setting</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('admin.auth.logout')  }}" class="dropdown-item">Log Out</a>
			</div>
		</li>
		<li class="divider d-none d-md-block"></li>
	</ul>
</div>
