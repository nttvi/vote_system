@extends('Home::layouts.master')

@push('css')

	<style>

		input[type=checkbox] {
		    display: none;
		}

		.checkboxThree {
		    width: 120px;
		    height: 40px;
		    background: #333;
		    margin: 20px 60px;
		 
		    border-radius: 50px;
		    position: relative;
		}

		.checkboxThree:before {
		    content: 'On';
		    position: absolute;
		    top: 9px;
		    left: 13px;
		    height: 2px;
		    color: #26ca28;
		    font-size: 16px;
		}

		.checkboxThree:after {
		    content: 'Off';
		    position: absolute;
		    top: 9px;
		    left: 84px;
		    height: 2px;
		    color: white;
		    font-size: 16px;
		}

		.checkboxThree label {
		    display: block;
		    width: 52px;
		    height: 22px;
		    border-radius: 50px;
		 
		    -webkit-transition: all .5s ease;
		    -moz-transition: all .5s ease;
		    -o-transition: all .5s ease;
		    -ms-transition: all .5s ease;
		    transition: all .5s ease;
		    cursor: pointer;
		    position: absolute;
		    top: 9px;
		    z-index: 1;
		    left: 12px;
		    background: #ddd;
		}
		 
		h4, h5{
			margin-bottom: 0px;
		}

		.checkboxThree input[type=checkbox]:checked + label {
		    left: 60px;
		    background: #26ca28;
		}

		table tr th{
			text-align: center;
			font-size: 20px;
		}

		table{
			width: 100%;
		}

		.nopadding-fluid{
			padding: 0px 2px 0px 2px;
		}

		.object-name{
			font-size: 20px;
		}
	</style>

@endpush


@section('content')
	<section class="page-title p-t-50 p-b-30" style="height:200px; background-image: url({{ asset('image/4.jpg')  }});filter:brightness(100%);;">
		<div class="container">
		</div>
	</section>
	<section class="election-detail m-t-20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="widget widget_links clearfix">
						<h3>Đối tượng bạn đã bình chọn</h3>
						<hr>
						<ul>
							@foreach(votedObject(Auth::guard('member')->id(),$data->id) as $vote)
							<li><a href="javascript:;"><div class="object-name">{{ objectName($vote->object_id) }}</div></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<h2>Trang bầu chọn: {{ $data->title }}</h2>
					<form action="#" method="post" accept-charset="utf-8">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4 nopadding-fluid"><table border="1"><tr><th>Hình ảnh</th></tr></table></div>
							<div class="col-md-6 nopadding-fluid"><table border="1"><tr><th>Thông tin</th></tr></table></div>
							<div class="col-md-2 nopadding-fluid"><table border="1"><tr><th>Bình chọn</th></tr></table></div>
							@foreach($data->objects as $key => $val)
								<div class="col-md-12  m-b-20 row">
									<div class="col-md-4">
										<img src="{{ asset($val->image) }}" style="width: 100%" class="image-election" id="{{ $val->id }}" alt="">
										<!-- <button type="submit" class="btn m-b-10" style="height: 200px; width: 100%; background-image: url({{ asset($val->image) }}); background-size: 100%; background-repeat: no-repeat;">
										</button> -->
									</div>
									<div class="col-md-6">
										<h4>{{ $val->title }}</h4>
										<h5>Mô tả: </h5><p>{{ $val->description }}</p>
									</div>
									<div class="col-md-2">
										<div class="checkboxThree">
											<input type="checkbox" value="{{ $val->id }}" {{ checkedObject(Auth::guard('member')->id(),$data->id,$val->id) }} id="checkboxThreeInput{{ $key }}" name="check[]" />
											<label for="checkboxThreeInput{{ $key }}"></label>
										</div>
									</div>
								</div>
							@endforeach
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<input type="hidden" value="{{ Auth::guard('member')->id() }}" name="member_id" />
								<button type="submit" style="width: 100%" class="btn btn-success">Bầu chọn!</button>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
		<div class="m-t-50"></div>
	</section>

@endsection

@push('js')

	<script type="text/javascript">
		$('.image-election').click(function () {
			alert($(this).attr('id'));
		});
	</script>

@endpush
