@extends('Dashboard::layouts.master')

@include('Election::election.breadcrumb')

@section('page')
        Thêm mới thể loại bầu chọn
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
            <div class="card-header bg-red">
                <h4 class="m-b-0 text-white">Thêm thể loại bầu chọn</h4>
            </div>
            <div class="card-body">
                <form class="form-material" method="post" action="">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên thể loại</label>
                                    <input type="text" name="title" required class="form-control" placeholder="Nhập tên cuộc bầu chọn" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mô tả</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                        <button type="reset" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Start Page Content -->
                
@endsection