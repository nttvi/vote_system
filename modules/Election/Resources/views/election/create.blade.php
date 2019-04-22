@extends('Dashboard::layouts.master')

@include('Election::election.breadcrumb')

@section('page')
        Thêm mới cuộc bầu cử
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
                <h4 class="m-b-0 text-white">Thêm cuộc bầu cử</h4>
            </div>
            <div class="card-body">
                <form class="form-material" method="post" action="">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thể loại bầu cử</label>
                                    <select name="election_type_id" class="form-control">
                                        <option value="">--Chọn thể loại--</option>
                                        @foreach($type as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên cuộc bầu cử</label>
                                    <input type="text" name="title" required class="form-control" placeholder="Nhập tên cuộc bầu cử" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số lượng người tham gia bầu cử</label>
                                    <input type="number" name="voter_quality" required class="form-control" placeholder="Nhập số lượng" value="{{ old('voter_quality ') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian bắt đầu</label>
                                    <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian kết thúc</label>
                                    <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>
                                    <textarea name="content" id="editor1" cols="30" rows="10"></textarea>
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

@push('js')


@endpush