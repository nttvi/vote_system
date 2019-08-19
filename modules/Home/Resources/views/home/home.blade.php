@extends('Home::layouts.master')

@push('css')
	<style>
		.slider-caption h2{
			text-transform: none;
			font-size: 62px;
		}

		.dark .slider-caption h2 {
		        color: white;
    			text-shadow: 1px 15px 15px rgb(0, 0, 0);
		}
		.slider-caption p{
			text-transform: none;
		    text-shadow: 1px 1px 1px rgb(13, 40, 115);

		}

		.button.button-border {
		    border: 2px solid #1104ad;
		    background-color: #3b3bbd3b;
		}

		.button.button-border.button-light {
		    border-color: #1104ad;
		    color: #F9F9F9;
		}
	</style>
@endpush

@section('content')

		<section id="slider" class="slider-element force-full-screen full-screen">

			<div class="force-full-screen full-screen dark" style="background-image: url('{{ asset('image/ken-1.jpg')}}');background-position: 100%; background-repeat: no-repeat; background-size: cover;">

				<div class="container clearfix">
					<div class="slider-caption slider-caption-center">
						<h2 data-animate="fadeInDown">Chào mừng bạn đến VoteNow!!!</h2>
						<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="400" style="color: white;">Tạo những cuộc bầu chọn và cùng tham gia bỏ phiếu bầu chọn</p>
						<a data-animate="fadeInUp" data-delay="600" href="#" class="button button-border button-light button-rounded button-large noleftmargin nobottommargin d-none d-md-inline-block" style="margin-top: 30px;">Tạo cuộc bầu chọn</a>
					</div>
				</div>

			</div>

		</section>

@endsection