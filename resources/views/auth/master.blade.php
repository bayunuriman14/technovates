<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{!! $title !!}</title>

	<!-- Global stylesheets -->
	<link href="{!! url('lib/theme') !!}/assets/css/css.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Plugins stylesheets -->
	<link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/sweetalert/sweetalert.css">
    <style type="text/css">
        label.error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 5px;
        }
    </style>
    <!-- /Plugins stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/app.js"></script>
	<!-- /theme JS files -->

	<!-- JS Plugins files -->
	<script type="text/javascript" src="{!! url('lib/plugins') !!}/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/custom.js"></script>
    <!-- /JS Plugins files -->
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::has('error'))
                sweeterror("{!! Session::get('error') !!}");
            @endif
            @if(Session::has('message'))
                sweetsuccess("{!! Session::get('message') !!}");
            @endif
            @if(Session::has('info'))
                notif_info("{!! Session::get('info') !!}");
            @endif
            @if(Session::has('warning'))
                notif_warning("{!! Session::get('warning') !!}");
            @endif
        });
    </script>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{!! url('auth') !!}">
				<strong>ADMIN AREA</strong>
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{!! url('') !!}">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
				@include($page)
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. Admin System All Rights Reserved.
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
