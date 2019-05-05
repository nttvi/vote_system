
<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
	<li><a href="{{ route('get.home.index') }}" ><div>Home</div></a></li>
	@if(Auth::guard('member')->check())
	<li><a href="{{ route('get.home.getCreateBauChon') }}">Tạo cuộc bầu chọn</a></li>
	<li><a href="#"><i class="fas fa-user-cog"></i>{{ Auth::guard('member')->user()->name }}</a>
		<ul>
			<li><a href="#"><i class="fas fa-user-circle"></i>Tài khoản</a></li>
			<li><a href="#"><i class="fas fa-tasks"></i>Các cuộc bầu chọn đã tạo</a></li>
			<li><a href="#"><i class="fas fa-tasks"></i>Các cuộc bầu chọn đã tham gia</a></li>
			<li><a href="{{ route('get.home.logout') }}"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a></li>
		</ul>
	</li>
	@else
	<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Đăng nhập</a></li>
	<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg2">Đăng ký</a></li>
	@endif
</ul>

<!-- Form đăng ký -->
<div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-body">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Đăng ký</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<center>
				<div class="modal-body container">
					<form action="{{ route('post.home.signup') }}" method="post" class="p-t-20">
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Họ tên:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Nhập tên của bạn">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Email:</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Nhập email của bạn">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Số điện thoại: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEmail3" name="phone" placeholder="09xxxxxxxxx">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Mật khẩu</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" id="inputEmail3" placeholder="********">
							</div>
						</div>
						<button type="submit" class="btn btn-success m-t-30">Đăng ký</button>
					</form>
				</div>
				</center>
			</div>
		</div>
	</div>
</div>

<!-- Form đăng nhập -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-body">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<center>
				<div class="modal-body container">
					<form action="{{ route('post.home.login') }}" method="post" class="p-t-20">
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" name="account" placeholder="Nhập email của bạn">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label white">Mật khẩu</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" id="inputEmail3" placeholder="********">
							</div>
						</div>
						<button type="submit" class="btn btn-success m-t-30">Đăng nhập</button>
					</form>
				</div>
				</center>
			</div>
		</div>
	</div>
</div>

