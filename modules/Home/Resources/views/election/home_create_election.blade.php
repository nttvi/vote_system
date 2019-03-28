@extends('Home::layouts.master')

@push('css')
	<style>
		.tab-nav li{
		    background: white;

		}

		.slider-caption.slider-caption-center{
			top: 120px !important;
		}
		
		ul.tab-nav.tab-nav2 li a{
			border: 3px solid #0000ffb5;
		    border-bottom: none;
		}

		ul.tab-nav.tab-nav2 li.ui-state-active a {
		    top: 0;
		    background-color: #1d14cc;
		    color: #FFF;
		    border: none;
		}
		.tab-container{
		    padding: 20px 20px 20px 20px;
		    background: white;
		    min-height: 300px;
			border-bottom: 3px solid #0000ffb5;
			border-right: 3px solid #0000ffb5;
		}

		.form-control{
			background-color: #b3b3b33d;
		}
	</style>
	    
@endpush

@section('content')
	
	<section id="slider" class="slider-element force-full-screen full-screen">

			<div class="force-full-screen full-screen" style="background-image: url('{{ asset('image/slider_create.jpg')}}');background-position: 100%; background-repeat: no-repeat; background-size: 100%">

				<div class="container clearfix">
					<div class="slider-caption slider-caption-center">
						<form action="#" method="post" class="p-t-20">
							{{ csrf_field() }}
							<div class="tabs clearfix" id="tab-3">

								<ul class="tab-nav tab-nav2 clearfix">
									<li><a href="#tabs-10">Thông tin cuộc bầu chọn</a></li>
									<li class="hidden-phone"><a href="#tabs-12">Đối tượng bầu chọn:</a></li>
									<li><a href="#tabs-11">Nội dung</a></li>
								</ul>

								<div class="tab-container">
									<div class="tab-content clearfix" id="tabs-10">
										
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Tiêu đề:</label>
											<div class="col-sm-9">
												<input type="email" class="form-control" id="inputEmail3" placeholder="Nhập tên">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Thời gian bắt đầu:</label>
											<div class="col-sm-9">
												<input type="datetime-local" class="form-control" id="inputEmail3" placeholder="22-10-2016">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Thời gian kết thúc:</label>
											<div class="col-sm-9">
												<input type="datetime-local" class="form-control" id="inputEmail3" placeholder="22-10-2016">
											</div>
										</div>
									</div>
									<div class="tab-content clearfix" id="tabs-12">
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Thể loại:</label>
											<div class="col-sm-9">
												<select name="" class="form-control" id="">
													<option value="">--Chọn thể loại bầu chọn--</option>
													<option value="">Bầu chọn Nhân vật</option>
													<option value="">Bầu chọn Địa điểm</option>
													<option value="">--Khác--</option>
												</select>
											</div>
										</div>
										<div class="form-group" id="insert-doituong">
											<div class="row m-b-10">
												<label for="inputEmail3" class="col-sm-3">Đối tượng:</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputEmail3">
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)" class="btn btn-info m-t-10 float-right" id="add-doituong"><i class="icon-plus"></i> Thêm đối tượng</a>
										</div>
									</div>

									<div class="tab-content clearfix" id="tabs-11">
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Số người tham gia:</label>
											<div class="col-sm-9">
												<input type="number" class="form-control" id="inputEmail3">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Nội dung:</label>
											<div class="col-sm-9">
												<textarea name="" rows="5" class="form-control"></textarea>
											</div>
										</div>
										<button tyoe="submit" class="btn btn-success m-t-10 float-right"><i class="icon-plus"></i> Tạo cuộc bầu chọn</button>
									</div>
									

								</div>

							</div>
						</form>
					</div>
				</div>

			</div>

		</section>

@endsection

@push('js')
	<script>
		$(document).ready(function(){
	        var i = 1;
	        $("#add-doituong").click(function(){
	            $("#insert-doituong").append('<div class="row m-b-10"><label for="inputEmail3" class="col-sm-3">Đối tượng:</label><div class="col-sm-9"><input type="text" class="form-control" id="inputEmail3"></div></div>');
	        });
	    });
	</script>
@endpush