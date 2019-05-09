@extends('Home::layouts.master')

@push('css')
	<style>
		.tab-nav li{
		    background: white;

		}

		.slider-caption.slider-caption-center{
			top: 120px !important;
		}

		.slider-caption.slider-caption-center .form-group{
			text-align: left;
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
						<form action="" method="post" class="p-t-20">
							{{ csrf_field() }}
							<div class="tabs clearfix" id="tab-3">

								<ul class="tab-nav tab-nav2 clearfix">
									<li><a href="#tabs-10">Thông tin cuộc bầu chọn</a></li>
									<li><a href="#tabs-11">Nội dung</a></li>
									<li class="hidden-phone"><a href="#tabs-12">Đối tượng bầu chọn:</a></li>
								</ul>

								<div class="tab-container">
									<div class="tab-content clearfix" id="tabs-10">
										<div class="row">
											<div class="form-group  col-sm-6">
												<label for="inputEmail1">Tiêu đề:</label>
												<input type="text" name="title" class="form-control" id="inputEmail1" placeholder="Nhập tên">
											</div>
											<div class="form-group col-sm-6">
												<label for="inputEmail2">Số người tham gia:</label>
												<input type="number" name="voter_quality" class="form-control" id="inputEmail2">
											</div>
											<div class="form-group col-sm-6">
												<label for="inputEmail3">Ngày bắt đầu:</label>
												<input type="date" name="start_date" class="form-control" id="inputEmail3">
											</div>
											<div class="form-group col-sm-6">
												<label for="inputEmail4">Thời gian bắt đầu:</label>
												<input type="time" name="start_time" class="form-control" id="inputEmail4">
											</div>
											<div class="form-group col-sm-6">
												<label for="inputEmail5">Ngày kết thúc:</label>
												<input type="date" name="end_date" class="form-control" id="inputEmail5">
											</div>
											<div class="form-group col-sm-6">
												<label for="inputEmail6">Thời gian kết thúc:</label>
												<input type="time" name="end_time" class="form-control" id="inputEmail6">
											</div>
										</div>
									</div>
									<div class="tab-content clearfix" id="tabs-11">
										<div class="form-group">
											<label for="inputEmail3">Nội dung:</label>
			                                <textarea name="content" id="editor1" cols="30" rows="10"></textarea>
										</div>
									</div>
									<div class="tab-content clearfix" id="tabs-12">
										<div class="form-group row">
											<label for="inputEmail3" class="col-sm-3">Thể loại:</label>
											<div class="col-sm-9">
												<select name="election_type_id" class="form-control" id="">
													<option value="">--Chọn thể loại bầu chọn--</option>
													@foreach($type as $key => $val)
													<option value="{{ $val->id }}">{{ $val->title }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group" id="insert-doituong">
											<div class="row m-b-10">
												<label for="inputEmail3" class="col-sm-3">Đối tượng 1:</label>
												<div class="col-sm-9">
													<input type="text"  class="form-control" id="inputEmail3" name="object[]">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-md-9">
												<a href="javascript:void(0)" class="btn btn-info float-left" id="add-doituong"><i class="icon-plus"></i> Thêm</a>
											</div>	
										</div>
										<div class="form-submit">
											<button type="submit" class="btn btn-success m-t-50 float-right"><i class="icon-plus"></i> Tạo cuộc bầu chọn</button>
										</div>	
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
    <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }} "></script>
	<script>
	    CKEDITOR.replace( 'editor1' );
		
		$(document).ready(function(){
	        var i = 2;
	        $("#add-doituong").click(function(){
	        	if(i<=5){
	            	$("#insert-doituong").append('<div class="row m-b-10"><label for="inputEmail3" class="col-sm-3">Đối tượng '+ i++ + ':</label><div class="col-sm-9"><input type="text" class="form-control" id="inputEmail3" name="object[]"></div></div>');
	        	}
	        });
	    });
	</script>
@endpush