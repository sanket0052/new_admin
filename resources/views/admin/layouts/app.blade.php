<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="shortcut icon" href="{{ asset('images/favicon_1.ico') }}">

		<!-- Bootstrap 3.3.5 -->
		{!! Html::style(asset('css/bootstrap.min.css')) !!}
		<!-- Font Awesome -->
		{!! Html::style(asset('assets/font-awesome/css/font-awesome.min.css')) !!}
		<!-- Ionicons -->
		{!! Html::style(asset('assets/ionicon/css/ionicons.min.css')) !!}
		<!-- Theme style -->
		{!! Html::style(asset('css/material-design-iconic-font.min.css')) !!}

		{!! Html::style(asset('css/animate.css')) !!}

		{!! Html::style(asset('css/waves-effect.css')) !!}

		{!! Html::style(asset('assets/sweet-alert/sweet-alert.min.css')) !!}

		{!! Html::style(asset('css/helper.css')) !!}

		{!! Html::style(asset('css/style.css')) !!}

		 @yield('css')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			{!! Html::style('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
			{!! Html::style('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
		<![endif]-->

		{!! HTML::script(asset('js/modernizr.min.js')); !!}
	</head>
	<body class="fixed-left">
		<div class="wrapper">
			<!-- Top Bar Start -->
			<div class="topbar">
				<!-- LOGO -->
				<div class="topbar-left">
					<div class="text-center">
						<a href="{{ url('/home') }}" class="logo"><img style="width:75px;" class="img-responsive" src="{{ asset('logos/') }}" ></a>
					</div>
				</div>
				<!-- Button mobile view to collapse sidebar menu -->
				<div class="navbar navbar-default" role="navigation">
					<div class="container">
						<div class="">
							<div class="pull-left">
								<button class="button-menu-mobile open-left">
									<i class="fa fa-bars"></i>
								</button>
								<span class="clearfix"></span>
							</div>
							<form class="navbar-form pull-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control search-bar" placeholder="Type here for search...">
								</div>
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</form>

							<ul class="nav navbar-nav navbar-right pull-right">
								<li class="dropdown hidden-xs">
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
										<i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
										<ul class="dropdown-menu dropdown-menu-lg">
									</a>
										<li class="text-center notifi-title">Notification</li>
										<li class="list-group">
										   <!-- list item-->
										   <a href="javascript:void(0);" class="list-group-item">
											  <div class="media">
												 <div class="pull-left">
													<em class="fa fa-user-plus fa-2x text-info"></em>
												 </div>
												 <div class="media-body clearfix">
													<div class="media-heading">New user registered</div>
													<p class="m-0">
													   <small>You have 10 unread messages</small>
													</p>
												 </div>
											  </div>
										   </a>
										   <!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
											  <div class="media">
												 <div class="pull-left">
													<em class="fa fa-diamond fa-2x text-primary"></em>
												 </div>
												 <div class="media-body clearfix">
													<div class="media-heading">New settings</div>
													<p class="m-0">
													   <small>There are new settings available</small>
													</p>
												 </div>
											  </div>
											</a>
											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
											  <div class="media">
												 <div class="pull-left">
													<em class="fa fa-bell-o fa-2x text-danger"></em>
												 </div>
												 <div class="media-body clearfix">
													<div class="media-heading">Updates</div>
													<p class="m-0">
													   <small>There are
														  <span class="text-primary">2</span> new updates available</small>
													</p>
												 </div>
											  </div>
											</a>
										   <!-- last list item -->
											<a href="javascript:void(0);" class="list-group-item">
											  <small>See all notifications</small>
											</a>
										</li>
									</ul>
								</li>
								<li class="hidden-xs">
									<a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
								</li>
								<li class="hidden-xs">
									<a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
								</li>
								<li class="dropdown">
									<a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
									<ul class="dropdown-menu">
										<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
										<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
										<li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
										<li><a href="{{ url('/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!--/.nav-collapse -->
					</div>
				</div>
			</div>
			<!-- Top Bar End -->


			<!-- ========== Left Sidebar Start ========== -->

			<div class="left side-menu">
				<div class="sidebar-inner slimscrollleft">
					<div class="user-details">
						<div class="pull-left">
							<img src="{{ asset('images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
						</div>
						<div class="user-info">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Hi, {{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
									<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
									<li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
									<li><a href="{{ url('/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
								</ul>
							</div>

							<!-- <p class="text-muted m-0">{{ \Auth::user()->load('role')->first()->title }}</p> -->
						</div>
					</div>
					<!--- Divider -->
					<div id="sidebar-menu">
						<ul>
							<li>
								<a href="{{ url('admin/home') }}" class="waves-effect {{ \Request::is('admin/home') ? 'active' : '' }}"><i class="md md-home"></i><span> Dashboard </span></a>
							</li>
							@if($user['role']['id'] == config('role.roles.SUPER_ADMIN'))
							<li>
								<a href="{{ url('admin/role') }}" class="waves-effect {{ \Request::is('admin/role') ? 'active' : '' }}"><i class="md-radio-button-off"></i><span> Role </span></a>
							</li>
							<li>
								<a href="{{ url('admin/report-listing') }}" class="waves-effect {{ \Request::is('admin/report-listing') ? 'active' : '' }}"><i class="md md-store"></i><span> Report Listing </span></a>
							</li>
							@endif
							@if($user['role']['id'] == config('role.roles.SUPER_ADMIN') || $user['role']['id'] == config('role.roles.COMPANY_ADMIN'))
							<li>
								<a href="{{ url('admin/user') }}" class="waves-effect {{ \Request::is('admin/user') ? 'active' : '' }}"><i class="md md-person"></i><span> User </span></a>
							</li>
							<li>
								<a href="{{ url('admin/company') }}" class="waves-effect {{ \Request::is('admin/company') ? 'active' : '' }}"><i class="md md-store"></i><span> Company </span></a>
							</li>
							<li>
								<a href="{{ url('admin/reports') }}" class="waves-effect {{ \Request::is('admin/reports') ? 'active' : '' }}"><i class="md md-assignment"></i><span> All Report </span></a>
							</li>
							@endif
							<li class="has_sub">
								<a href="" class="waves-effect {{ \Request::is('admin/report') ? 'active' : '' }}"><i class="md md-assignment"></i><span> Reports </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									@foreach($reports as $key => $value)
										<li><a href="{{ url('admin/report/'.$key) }}"> {{ $value }} </a></li>
									@endforeach
									<!-- <li><a href="{{ url('admin/report/master-report') }}"> Aceess Report </a></li>
									<li><a href="{{ url('admin/reports') }}"> All Reports </a></li>
									<li><a href="{{ url('admin/report/ledger') }}"> Ledger </a></li>
									<li><a href="{{ url('admin/report/sales') }}"> Sales Order OS </a></li>
									<li><a href="{{ url('admin/report/reorder') }}"> Reorder Status </a></li>
									<li><a href="{{ url('admin/report/stock') }}"> Stock Status </a></li>
									<li><a href="{{ url('admin/report/price') }}"> Price List </a></li>
									<li><a href="{{ url('admin/report/extra') }}"> Extra Report </a></li> -->
								</ul>
							</li>
							<!--
							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-mail"></i><span> Mail </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="inbox.html">Inbox</a></li>
									<li><a href="email-compose.html">Compose Mail</a></li>
									<li><a href="email-read.html">View Mail</a></li>
								</ul>
							</li>

							<li>
								<a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Calendar </span></a>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Elements </span> <span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="typography.html">Typography</a></li>
									<li><a href="buttons.html">Buttons</a></li>
									<li><a href="panels.html">Panels</a></li>
									<li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
									<li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
									<li><a href="modals.html">Modals</a></li>
									<li><a href="bootstrap-ui.html">BS Elements</a></li>
									<li><a href="progressbars.html">Progress Bars</a></li>
									<li><a href="notification.html">Notification</a></li>
									<li><a href="sweet-alert.html">Sweet-Alert</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Components </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="grid.html">Grid</a></li>
									<li><a href="portlets.html">Portlets</a></li>
									<li><a href="widgets.html">Widgets</a></li>
									<li><a href="nestable-list.html">Nesteble</a></li>
									<li><a href="ui-sliders.html">Sliders </a></li>
									<li><a href="gallery.html">Gallery </a></li>
									<li><a href="pricing.html">Pricing Table </a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Icons </span> <span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="material-icon.html">Material Design</a></li>
									<li><a href="ion-icons.html">Ion Icons</a></li>
									<li><a href="font-awesome.html">Font awesome</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="form-elements.html">General Elements</a></li>
									<li><a href="form-validation.html">Form Validation</a></li>
									<li><a href="form-advanced.html">Advanced Form</a></li>
									<li><a href="form-wizard.html">Form Wizard</a></li>
									<li><a href="form-editor.html">WYSIWYG Editor</a></li>
									<li><a href="code-editor.html">Code Editors</a></li>
									<li><a href="form-uploads.html">Multiple File Upload</a></li>
									<li><a href="form-xeditable.html">X-editable</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Data Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="tables.html">Basic Tables</a></li>
									<li><a href="table-datatable.html">Data Table</a></li>
									<li><a href="tables-editable.html">Editable Table</a></li>
									<li><a href="responsive-table.html">Responsive Table</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-poll"></i><span> Charts </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="morris-chart.html">Morris Chart</a></li>
									<li><a href="chartjs.html">Chartjs</a></li>
									<li><a href="flot-chart.html">Flot Chart</a></li>
									<li><a href="peity-chart.html">Peity Charts</a></li>
									<li><a href="charts-sparkline.html">Sparkline Charts</a></li>
									<li><a href="chart-radial.html">Radial charts</a></li>
									<li><a href="other-chart.html">Other Chart</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-place"></i><span> Maps </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="gmap.html"> Google Map</a></li>
									<li><a href="vector-map.html"> Vector Map</a></li>
								</ul>
							</li>

							<li class="has_sub">
								<a href="#" class="waves-effect"><i class="md md-pages"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul class="list-unstyled">
									<li><a href="profile.html">Profile</a></li>
									<li><a href="timeline.html">Timeline</a></li>
									<li><a href="invoice.html">Invoice</a></li>
									<li><a href="email-template.html">Email template</a></li>
									<li><a href="contact.html">Contact-list</a></li>
									<li><a href="login.html">Login</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="recoverpw.html">Recover Password</a></li>
									<li><a href="lock-screen.html">Lock Screen</a></li>
									<li><a href="blank.html">Blank Page</a></li>
									<li><a href="maintenance.html">Maintenance</a></li>
									<li><a href="coming-soon.html">Coming-soon</a></li>
									<li><a href="404.html">404 Error</a></li>
									<li><a href="404_alt.html">404 alt</a></li>
									<li><a href="500.html">500 Error</a></li>
								</ul>
							</li>
							<li class="has_sub">
								<a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
								<ul>
									<li class="has_sub">
										<a href="javascript:void(0);" class="waves-effect"><span>Report</span> <span class="pull-right"><i class="md md-add"></i></span></a>
										<ul style="">
											<li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
											<li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
											<li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
									</li>
								</ul>
							</li>
						-->
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- Left Sidebar End -->



			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="pull-left page-title">Welcome !</h4>
								<ol class="breadcrumb pull-right">
									<li><a href="#">Moltran</a></li>
									<li class="active">Dashboard</li>
								</ol>
							</div>
						</div>

						@yield('content')

				</div> <!-- container -->

				</div> <!-- content -->

				<footer class="footer text-right">
					2015 © Moltran.
				</footer>

			</div>
			<!-- ============================================================== -->
			<!-- End Right content here -->
			<!-- ============================================================== -->


			<!-- Right Sidebar -->
			<div class="side-bar right-bar nicescroll">
				<h4 class="text-center">Chat</h4>
				<div class="contact-list nicescroll">
					<ul class="list-group contacts-list">
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-1.jpg') }}" alt="">
								</div>
								<span class="name">Chadengle</span>
								<i class="fa fa-circle online"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-2.jpg') }}" alt="">
								</div>
								<span class="name">Tomaslau</span>
								<i class="fa fa-circle online"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-3.jpg') }}" alt="">
								</div>
								<span class="name">Stillnotdavid</span>
								<i class="fa fa-circle online"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-4.jpg') }}" alt="">
								</div>
								<span class="name">Kurafire</span>
								<i class="fa fa-circle online"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-5.jpg') }}" alt="">
								</div>
								<span class="name">Shahedk</span>
								<i class="fa fa-circle away"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-6.jpg') }}" alt="">
								</div>
								<span class="name">Adhamdannaway</span>
								<i class="fa fa-circle away"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-7.jpg') }}" alt="">
								</div>
								<span class="name">Ok</span>
								<i class="fa fa-circle away"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-8.jpg') }}" alt="">
								</div>
								<span class="name">Arashasghari</span>
								<i class="fa fa-circle offline"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-9.jpg') }}" alt="">
								</div>
								<span class="name">Joshaustin</span>
								<i class="fa fa-circle offline"></i>
							</a>
							<span class="clearfix"></span>
						</li>
						<li class="list-group-item">
							<a href="#">
								<div class="avatar">
									<img src="{{ asset('images/users/avatar-10.jpg') }}" alt="">
								</div>
								<span class="name">Sortino</span>
								<i class="fa fa-circle offline"></i>
							</a>
							<span class="clearfix"></span>
						</li>
					</ul>
				</div>
			</div>
			<!-- /Right-bar -->

		</div>
		<!-- END wrapper -->

		<script>
				var resizefunc = [];
		</script>

		<!-- jQuery 2.1.4 -->
		{!! HTML::script(asset('js/jquery.min.js')); !!}
		<!-- jQuery UI 1.11.4 -->
		{!! HTML::script(asset('js/bootstrap.min.js')); !!}
		{!! HTML::script(asset('js/waves.js')); !!}
		<!-- Morris.js charts -->
		{!! HTML::script(asset('js/wow.min.js')); !!}
		{!! HTML::script(asset('js/jquery.nicescroll.js')); !!}
		{!! HTML::script(asset('js/jquery.scrollTo.min.js')); !!}
		<!-- jvectormap -->
		{!! HTML::script(asset('assets/chat/moment-2.2.1.js')); !!}
		{!! HTML::script(asset('assets/jquery-sparkline/jquery.sparkline.min.js')); !!}
		{!! HTML::script(asset('assets/jquery-detectmobile/detect.js')); !!}
		<!-- jQuery Knob Chart -->
		{!! HTML::script(asset('assets/fastclick/fastclick.js')); !!}
		<!-- daterangepicker -->
		{!! HTML::script(asset('assets/jquery-slimscroll/jquery.slimscroll.js')); !!}
		{!! HTML::script(asset('assets/jquery-blockui/jquery.blockUI.js')); !!}
		<!-- datepicker -->
		{!! HTML::script(asset('assets/sweet-alert/sweet-alert.min.js')); !!}
		{!! HTML::script(asset('assets/sweet-alert/sweet-alert.init.js')); !!}

		{!! HTML::script(asset('assets/counterup/waypoints.min.js')); !!}
		<!-- Slimscroll -->
		{!! HTML::script(asset('assets/counterup/jquery.counterup.min.js')); !!}
		{!! HTML::script(asset('js/jquery.app.js')); !!}
		{!! HTML::script(asset('js/jquery.dashboard.js')); !!}
		<!-- FastClick -->
		{!! HTML::script(asset('js/jquery.chat.js')); !!}
		<!-- AdminLTE App -->
		{!! HTML::script(asset('js/jquery.todo.js')); !!}

		@yield('js')

		<script type="text/javascript">
			/* ==============================================
			Counter Up
			=============================================== */
			jQuery(document).ready(function($) {
				$('.counter').counterUp({
					delay: 100,
					time: 1200
				});
			});
		</script>
	</body>
</html>
