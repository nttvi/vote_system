<?php 
	
	if(Auth::guard('member')->check()){
        $member =\App\Member::find(Auth::guard('member')->id());
        // dd($member);
        if($member->status != 1){
        	Auth::guard('member')->logout();
        	return redirect()->route('get.home.index');
        }

	}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/style.css') }}" type="text/css" />
	
	<!-- One Page Module Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('/frontend/onepage.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('/frontend/css/swiper.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/et-line.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('/frontend/css/fonts.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/frontend/css/responsive.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('/css/custom_hp.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Votenow</title>


	<style>
		.modal-backdrop.show{
			z-index: 1;
		}

		.dark .modal-content{
    		background-color: #128f9a;
		}

		.dark .form-control:not(.not-dark), .dark .sm-form-control:not(.not-dark) {
		    color: white;
		    background-color: rgba(80, 73, 73, 0.2);
		    border-color: rgba(0,0,0,0.25);
		}


		.dark .form-control:not(.not-dark)::-webkit-input-placeholder {
		   color: #ffffffa1;
		}

    	#header.transparent-header:not(.sticky-header) #header-wrap {
    		background: #1035b9;
		}	

		#footer.dark {
	    	background-color: #0f3cdcd4;
	    }

	    .dark #primary-menu:not(.not-dark) ul ul{
	    	background-color: #1035b9bd;
    		border-color: #031eb1;
	    }

	    .dark #primary-menu:not(.not-dark) ul ul li > a{
	    	color: #fff !important;
	    }

	    #primary-menu ul li a {
			font-weight: 600;
	    }
	</style>
	@stack('css')
</head>

<body class="stretched side-push-panel">

	<div class="body-overlay"></div>

	

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix" style="max-height: 431px">
		


		<!-- Header
		============================================= -->
		
		@include('Home::layouts.header')

		<!-- #header end -->


		<!-- Content
		============================================= -->

		@yield('content')

		<!-- #content end -->

		<!-- Footer
		============================================= -->
		

		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{{ asset('/frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('/frontend/js/plugins.js') }}"></script>

	<!-- Google Map JavaScripts
	============================================= -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script src="{{ asset('/frontend/js/jquery.gmap.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('/frontend/js/functions.js') }}"></script>
	<script src="{{ asset('/frontend/js/chart.js') }}"></script>
	<script src="{{ asset('/frontend/js/chart-utils.js') }}"></script>
	
	@stack('js')
	

</body>
</html>