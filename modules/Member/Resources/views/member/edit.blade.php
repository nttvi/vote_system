@extends('Dashboard::layouts.master')

@include('Member::member.breadcrumb')

@section('page')
        Chỉnh sửa thành viên
@endsection

@section('content')
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
        <div class="card">
            <div class="card-header bg-red row">
                <div class="col-md-6">
                    <h4 class="m-b-0 text-white">Chỉnh sửa thành viên</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('get.list.member') }}" class="btn btn-warning float-right"><i class="fas fa-undo-alt"></i> Về danh sách thành viên</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-material" method="post" action="">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên thành viên</label>
                                    <input type="text" name="name" required class="form-control" placeholder="Nhập tên thành viên" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" required class="form-control" placeholder="Nhập tên thành viên" value="{{ $data->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Nhập tên thành viên" value="{{ $data->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Nhập tên thành viên" value="{{ $data->address }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option @if($data->status == 1) selected="" @endif value="1">Enable</option>
                                        <option @if($data->status == 0) selected="" @endif value="0">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                                <button type="reset" class="btn btn-inverse">Cancel</button>
                            </div>        
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('get.election.join.member',$data->id) }}" class="btn btn-success float-right"><i class="fas fa-tasks"></i> Các cuộc bầu chọn đã tham gia</a>
                            <a href="{{ route('get.election.member',$data->id) }}" class="btn btn-success float-right m-r-5"><i class="fas fa-tasks"></i> Các cuộc bầu chọn đã tạo</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- Start Page Content -->
                
@endsection