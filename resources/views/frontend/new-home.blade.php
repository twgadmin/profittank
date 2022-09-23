<!-- page content  -->

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
      <!-- page title -->
      <title>Dashboard</title>
      <!-- css style sheets -->
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/layout.css') !!}">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/style.css') !!}">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/sweet-alert.css') !!}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <!-- style -->
<!-- CSS - STYLING -->
<style>

</style>
      <!-- style -->
   </head>

    
   <body class="newHome">
    <!-- headar -->
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
								<a href="{!! route('home') !!}" class="logo">
									<?php /* <img src="{!! asset('assets/frontend/website/assets/images/logo-white.png') !!}" alt="">*/ ?>
							</a>
						</div>
						<div class="col-auto">
							<div class="row">
								<div class="col-auto">
									<div class="menuWrap">
										<ul class="menu">
											<li><a href="#">Why ProfitTank</a><li>
											<li><a href="#">Products</a><li>
											<li><a href="#">Pricing</a><li>
											<li><a href="#">About ProfitTank</a><li>
											<li><a href="#">Professional Advisors</a><li>
											<li class="seprator"><a href="#">Business</a><li>
											<li><a class="btn-demo" href="#">Request Demo</a></li>

											@if (auth()->check())
												<!-- <li><a href="{!! route('welcome') !!}">Dashboard</a></li> -->
												<!-- <li><a href="javascript:;" onclick="logout()">Logout</a></li> -->
											@else
												<li><a href="{!! route('login') !!}">Login</a></li> 
												<li class="seprator"><a href="{!! route('register') !!}">Signup</a></li>
											@endif 
										</ul>
									
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>  
	<!-- header -->
	<!-- content area  -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-section">
						<div class="home-content">
							<h2 class="home-sm-heading">Coming 2022</h2>
							<h1>Stimulate growth, increases cash flow and <br/>improve profit margins faster than ever.</h1>
							<ul class="btn-h-list">
								<li><a href="#" class="text-center">Business</a></li>
								<li><a href="#" class="text-center">Professional Advisors</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- content area  -->
	<!-- Template JS File -->
	<script src="http://localhost/profittank/public/assets/frontend/website/assets/js/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
   <script src="http://localhost/profittank/public/assets/frontend/website/assets/js/custom.js"></script>
   <script src="http://localhost/profittank/public/assets/frontend/website/assets/js/sweet-alert.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  
</body>
</html>