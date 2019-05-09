@extends('Home::layouts.master')

@section('content')

	<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-md-12">
						

							<div class="heading-block noborder center">
								<img src="{{ asset('frontend/images/icons/avatar.jpg') }}" class="img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">
								<h3>{{ $data->name }}</h3>
								<span>{{ $data->email }}</span>
							</div>
								
							@include('Home::layouts.notification')
							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-lg-12">

									<div class="tabs tabs-alt clearfix" id="tabs-profile">

										<ul class="tab-nav clearfix">
											<li><a href="#tab-feeds"><i class="icon-user"></i>Thông tin cá nhân</a></li>
											<li><a href="#tab-posts"><i class="icon-pencil"></i> Các cuộc bầu chọn đã tạo</a></li>
											<li><a href="#tab-replies"><i class="icon-pencil2"></i> Các cuộc bầu chọn đã tham gia</a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tab-feeds">
												<div class="container">
													<form action="" method="post">
														{{ csrf_field() }}
														<div class="row">
															<div class="col-md-6 form-group">
																<label for="">Họ tên</label>
																<input type="text" class="form-control" name="name" value="{{ $data->name }}">
															</div>
															<div class="col-md-6 form-group">
																<label for="">Số điện thoại</label>
																<input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
															</div>
															<div class="col-md-6 form-group">
																<label for="">Email</label>
																<input type="text" class="form-control" name="email" value="{{ $data->email }}">
															</div>
															<div class="col-md-6 form-group">
																<label for="">Địa chỉ</label>
																<input type="text" class="form-control" name="address" value="{{ $data->address }}">
															</div>
															<div class="col-md-12">
																<button type="submit" class="btn btn-success float-right">Lưu</button>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="tab-content clearfix" id="tab-posts">

												<div class="topmargin-sm clearfix">

													<table class="table table-bordered table-striped">
													  <thead>
														<tr>
														  <th>STT</th>
														  <th>Tên cuộc bầu chọn</th>
														  <th style="text-align: center; width: 300px">Thao tác</th>
														</tr>
													  </thead>
													  <tbody>
													  	@foreach($data->election as $key => $val)
														<tr>
															<td>{{ $key+1 }}</td>
															<td>{{ $val->title }}</td>
															<td>
																<center>
																	<a href="#" class="btn btn-success" style="color: white">Xem</a>
																	<a href="{{ route('get.home.getEditBauChon',[$val->id,$val->slug]) }}" class="btn btn-warning" style="color: white">Chỉnh sửa</a>
																	<a href="#" class="btn btn-danger">Xóa</a>
																</center>
															</td>
														</tr>
														@endforeach
													  </tbody>
													</table>

												</div>

											</div>
											<div class="tab-content clearfix" id="tab-replies">

												<div class="topmargin-sm clearfix">

													<table class="table table-bordered table-striped">
													  <thead>
														<tr>
														  <th>STT</th>
														  <th>Tên cuộc bầu chọn</th>
														  <th>Người tạo</th>
														  <th style="text-align: center; width: 300px">Thao tác</th>
														</tr>
													  </thead>
													  <tbody>
													  	@foreach($data->voter as $key => $val)
														<tr>
															<td>{{ $key+1 }}</td>
															<td>{{ $val->election->title }}</td>
															<td>{{ $val->election->member->name }}</td>
															<td>
																<center>
																	<a href="#" class="btn btn-success" style="color: white">Xem</a>
																</center>
															</td>
														</tr>
														@endforeach
													  </tbody>
													</table>

												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="w-100 line d-block d-md-none"></div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

@endsection