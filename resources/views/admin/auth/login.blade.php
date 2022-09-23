@extends('admin.layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])
@section('title', 'Login Page')
@section('content')
<style>
    .login.login-with-news-feed .right-content {
    min-height: 100%;
    background: #2d353c;
    width: 500px;
    margin-left: auto;
    padding: 60px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}
.login.login-with-news-feed .login-header .brand .small, .login.login-with-news-feed .login-header .brand small, .register.register-with-news-feed .login-header .brand .small, .register.register-with-news-feed .login-header .brand small {
    font-size: 14px;
    display: block;
    color: rgba(255,255,255);
    font-weight: 400;
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.4375rem 0.75rem;
    font-size: .75rem;
    font-weight: 600;
    line-height: 1.5;
    color: #FFFFFF;
    background-color:#2d353c;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 4px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.form-control, .form-select {
    border-color: #495057;
}
.form-control:focus {
    color: #FFFFFF;
    background-color: #2d353c;
    border-color: #67abe9;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(52 143 226 / 25%);
}
body{
color: #dee2e6;
}
.text-inverse {
    color: #ffffff!important;
}
hr {
    border: none;
    height: 1px;
    background: rgb(255 255 255 / 31%);
}
</style>
	<!-- begin login -->
	<div class="login login-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url( {!! asset('/assets/img/login-bg/not-login-bg-17.jpg') !!} )"></div>
			<div class="news-caption">
				
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header">
				<?php /* <img src="{!! asset('/assets/img/logo/logo-admin.png') !!}"  style="width:50%"/>*/ ?>
				<div class="icon">
					<i class="fa fa-sign-in-alt"></i>
				</div>
			</div>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
            <!-- BEGIN LOGIN FORM -->
            <form method="POST" action="{{ route('admin.auth.login') }}" class="margin-bottom-0"">
            
            @csrf

            
    <!-- <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>Please enter username and password</span>
    </div> -->

    @if (count($errors) > 0)
        <div class="alert alert-danger custom">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            @foreach ($errors->all() as $error)
                {{ $error }}<br />
            @endforeach
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            {{ session('message') }}
        </div>
    @endif
					<div class="form-group m-b-15">
						<input type="text" class="form-control form-control-lg" name="email" placeholder="Email Address" required />
					</div>
					<div class="form-group m-b-15">
						<input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required />
					</div>
					<div class="checkbox checkbox-css m-b-30">
						<input type="checkbox" id="remember_me_checkbox" name="remember" value="1"/>
						<label for="remember_me_checkbox">
						Remember Me
						</label>
					</div>
					<div class="login-buttons">
						<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
					</div>
					<hr />
					<p class="text-center text-grey-darker mb-0">
						&copy; All Right Reserved 2020
					</p>
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end right-container -->
	</div>
	<!-- end login -->
@endsection
