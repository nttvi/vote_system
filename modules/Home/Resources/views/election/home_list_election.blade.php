@extends('Home::layouts.master')


@push('css')
	<style type="text/css" media="screen">
		.text-rotater{
			color: white;
		}
		
		label{
			text-transform: none;
			font-size: 16px;
			margin-bottom: 0px;
		}

		#header.transparent-header:not(.sticky-header) #header-wrap {
    		background: #1035b94f;
		}
	</style>
@endpush


@section('content')

<section id="slider" class="slider-element slider-parallax" style="background: url({{ asset('image/ken-1.jpg') }}); background-size: cover;" data-height-xl="300" data-height-lg="40" data-height-md="40" data-height-sm="40" data-height-xs="40">
	<div class="slider-parallax-inner">
		<div class="container clearfix">
			<div class="vertical-middle center">

				<div class="heading-block nobottomborder center">
					<h1>
						<div class="text-rotater" data-separator="|" data-rotate="flipInX" data-speed="3500">
							Tham gia các cuộc bầu chọn <span class="t-rotate">Mới Nhất|Phổ Biến Nhất</span>
						</div>
					</h1>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="election-list m-t-30 m-b-30">
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="widget widget_links clearfix">
					<h4>Danh mục</h4>
					<ul>
						@foreach($categories as $cate)
						<li><a href="{{ route('get.home.getHomeElectionListByCate',$cate->id) }}"><div>{{ $cate->title }}</div></a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				@if(isset($category))
					<h4>{{ $category->title }}</h4>
				@endif
				<div class="row">
					@foreach($data as $key => $val)
					<div class="col-md-4">
						<div class="card noborder">
							<div class="card-body">
								<div class="card-image">
									<a href="{{ route('get.home.getHomeElectionDetailContent',$val->id) }}"><img src="{{ asset('image/ken-1.jpg') }}" alt="" width="100%"></a>
								</div>
								<div class="card-title" style="height: 132px; margin-top: 10px; ">
									<a href="{{ route('get.home.getHomeElectionDetailContent',$val->id) }}"><h4>{{ $val->title }}</h4></a>
									<div class="card-time" style="margin-bottom: 0px">
										<label>Bắt đầu:</label> {{ dateFormat($val->start_date) }} - {{ $val->start_time }}<br>
										<label>Kết thúc:</label> {{ dateFormat($val->end_date) }} - {{ $val->end_time }}	
									</div>
								</div>
								<div class="card-icon">
									<div class="object row">
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<i class="fas fa-cubes"></i>
											{{ count($val->objects) }} -
											<i class="fas fa-users"></i>
											{{ count($val->voter) }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-md-12">
						<div class="pagination float-right">
							{{ $data->render() }}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
		
</section>


@endsection