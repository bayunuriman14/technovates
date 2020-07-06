<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{!! !empty(Helper::site()->favicon) ? url('images/'.Helper::site()->favicon) : '' !!}" type="image/x-icon">
    <link rel="icon" href="{!! !empty(Helper::site()->favicon) ? url('images/'.Helper::site()->favicon) : '' !!}" type="image/x-icon">
	<title>{!! !empty($title) ? $title.' -' : '' !!} Admin System </title>

	<!-- Global stylesheets -->
	<link href="{!! url('lib/theme') !!}/assets/css/css.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="{!! url('lib/theme') !!}/assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Plugins stylesheets -->
	<link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/sweetalert/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="{!! url('lib/plugins') !!}/datatables/dataTables.bootstrap.css">


	@yield('style')
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
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/app.js"></script>
	{{-- // <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/datatables_basic.js"></script> --}}
	<!-- /theme JS files -->


	<!-- JS Plugins files -->
	<script type="text/javascript" src="{!! url('lib/plugins') !!}/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/components_notifications_pnotify.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/form_inputs.js"></script>
    @yield('script')
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/custom.js"></script>
    <!-- /JS Plugins files -->
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::has('error'))
                notif_error("{!! Session::get('error') !!}");
            @endif
            @if(Session::has('message'))
                notif_success("{!! Session::get('message') !!}");
            @endif
            @if(Session::has('info'))
                notif_info("{!! Session::get('info') !!}");
            @endif
            @if(Session::has('warning'))
                notif_warning("{!! Session::get('warning') !!}");
            @endif

            $('.select-search').select2();

            $('.pickadate').pickadate({
                format: 'dd-mm-yyyy',
                formatSubmit: 'yyyy-mm-dd'
            });
        });
    </script>

    <!-- sweet alert-->
	  <script src="{!! url('lib/plugins') !!}/sweetalert/sweetalert.min.js"></script>
	  <link rel="stylesheet" href="{!! url('lib/plugins') !!}/sweetalert/sweetalert.css">
    <!-- iOS overlay -->
    <script src="{!! url('lib/plugins') !!}/overlay/iosOverlay.js"></script>
    <script src="{!! url('lib/plugins') !!}/overlay/spin.min.js"></script>
    <link rel="stylesheet" href="{!! url('lib/plugins') !!}/overlay/iosOverlay.css">
    <script src="{!! url('lib/plugins') !!}/overlay/modernizr-2.0.6.min.js"></script>
    <script type="text/javascript">
        function createOverlay(screenText) {
            var target = document.createElement("div");
            document.body.appendChild(target);
            var opts = {
                lines: 13, // The number of lines to draw
                length: 11, // The length of each line
                width: 5, // The line thickness
                radius: 17, // The radius of the inner circle
                corners: 1, // Corner roundness (0..1)
                rotate: 0, // The rotation offset
                color: '#FFF', // #rgb or #rrggbb
                speed: 1, // Rounds per second
                trail: 60, // Afterglow percentage
                shadow: false, // Whether to render a shadow
                hwaccel: false, // Whether to use hardware acceleration
                className: 'spinner', // The CSS class to assign to the spinner
                zIndex: 2e9, // The z-index (defaults to 2000000000)
                top: 'auto', // Top position relative to parent in px
                left: 'auto' // Left position relative to parent in px
            };
            var spinner = new Spinner(opts).spin(target);
            gOverlay = iosOverlay({
                text: screenText,
                /*duration: 2e3,*/
                spinner: spinner
            });
        }

				function insertAtCaret(areaId, text) {
		      var txtarea = document.getElementById(areaId);
		      if (!txtarea) { return; }

		      var scrollPos = txtarea.scrollTop;
		      var strPos = 0;
		      var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
		        "ff" : (document.selection ? "ie" : false ) );
		      if (br == "ie") {
		        txtarea.focus();
		        var range = document.selection.createRange();
		        range.moveStart ('character', -txtarea.value.length);
		        strPos = range.text.length;
		      } else if (br == "ff") {
		        strPos = txtarea.selectionStart;
		      }

		      var front = (txtarea.value).substring(0, strPos);
		      var back = (txtarea.value).substring(strPos, txtarea.value.length);
		      txtarea.value = front + text + back;
		      strPos = strPos + text.length;
		      if (br == "ie") {
		        txtarea.focus();
		        var ieRange = document.selection.createRange();
		        ieRange.moveStart ('character', -txtarea.value.length);
		        ieRange.moveStart ('character', strPos);
		        ieRange.moveEnd ('character', 0);
		        ieRange.select();
		      } else if (br == "ff") {
		        txtarea.selectionStart = strPos;
		        txtarea.selectionEnd = strPos;
		        txtarea.focus();
		      }

		      txtarea.scrollTop = scrollPos;
		    }

        var gOverlay;
    </script>

    <!--pick-a-time -->
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="{!! url('lib/plugins') !!}/pickers/pickadate/legacy.js"></script>

    
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	@include('admin.top_nav')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('admin.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				@include('admin.breadcrumb')
				
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

				@yield('content')


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2019 all right reserved. | Developed by @bayunuriman
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
