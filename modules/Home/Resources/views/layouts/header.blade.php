		<header id="header" class="full-header transparent-header border-full-header dark static-sticky" data-sticky-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="100">

			<div id="header-wrap">

				<div class="container clearfix">
					
					
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="{{ route('get.home.index') }}" class="standard-logo"  data-dark-logo="{{ asset('image/votenow_logo_dark.png') }}"><img src="{{ asset('image/votenow_logo.png') }}" alt="Eventnary Logo"></a>

						<a href="{{ route('get.home.index') }}" class="retina-logo" data-dark-logo="{{ asset('image/votenow_logo.png') }}"><img src="{{ asset('image/votenow_logo.png') }}" alt="Eventnary Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						@include('Home::layouts.menu')

					
						

						<!-- Top Search
						============================================= -->
						
						<!-- #top-search end -->

					</nav><!-- #primary-menu end -->

					

				</div>


						
			</div>

		</header>

