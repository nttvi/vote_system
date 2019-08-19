@extends('Home::layouts.master')

@push('css')

	<style type="text/css" media="screen">
		table tr th{
			text-align: center;
			font-size: 20px;
		}

		table{
			width: 100%;
		}
	</style>

@endpush



@section('content')

<section id="page-title">

			<div class="container clearfix">
				<h1>Tham gia bầu chọn</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Tham gia bầu chọn</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title row">
									<div class="col-md-6">
										<h2>{{ $data->title }}</h2>
									</div>
									<div class="col-md-6">
										<a href="{{ route('get.home.getHomeElectionDetail',$data->id) }}" class="btn btn-info float-right">Tham gia bầu chọn</a>
									</div>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 10th July 2014</li>
									<li><a href="#"><i class="icon-user"></i> admin</a></li>
									<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
									<li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul><!-- .entry-meta end -->

								<div class="entry-detail">
									<div class="bottommargin divcenter" style="max-width: 40%; min-height: 350px;">
										<canvas id="chart-0" height="250px"></canvas>
									</div>
								</div>


								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<a href="#"><img src="{{ asset('image/ken-1.jpg') }}" alt="Blog Single"></a>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">

									
									{!! $data->content !!}
									<div class="clear"></div>

								</div>
								<div class="entry-objects notopmargin">
									<table>
										<thead>
											<tr>
												<th>Tên đối tượng</th>
												<th>Hình ảnh</th>
												<th>Mô tả</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data->objects as $key => $val)
											<tr>
												<td width="200px">{{ $val->title }}</td>
												<td width="200px"> <img src="{{ asset($val->image) }}" width="100%" alt=""></td>
												<td>{{ $val->description }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
									<div class="clear"></div>

								</div>
							</div><!-- .entry end -->


							<div class="line"></div>


						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin clearfix">
						<div class="sidebar-widgets-wrap">
							<div class="widget widget_links clearfix">
								<h4>Danh mục</h4>
								<ul>
									@foreach($categories as $cate)
									<li><a href="{{ route('get.home.getHomeElectionListByCate',$cate->id) }}"><div>{{ $cate->title }}</div></a></li>
									@endforeach
								</ul>
							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section>


@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/google-palette@1.1.0/palette.min.js"></script>
<!-- This is a copy of palette.js -->
<script src="https://codepen.io/anon/pen/aWapBE.js"></script>
	<script>

		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};
		var myData = [<?php foreach($data->objects as $key => $val){ ?>
						"{{ countVote($val->id,$data->id) }}",
					<?php } ?>]
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: myData,
					backgroundColor: palette('tol', myData.length).map(function(hex) {
				        return '#' + hex;
				      }),
					label: 'Dataset 1'
				}],
				labels: [
				<?php foreach($data->objects as $key => $val){ ?>
					"{{ $val->title }}",
				<?php } ?>
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById("chart-0").getContext("2d");
			window.myPie = new Chart(ctx, config);
		};


	</script>

@endpush