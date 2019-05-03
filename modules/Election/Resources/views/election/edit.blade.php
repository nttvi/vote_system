@extends('Dashboard::layouts.master')

@include('Election::election.breadcrumb')

@section('page')
        Chỉnh sửa cuộc bầu chọn
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
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-0 text-white">Thêm cuộc bầu chọn</h4>
                    </div>
                    <div class="col-md-6">
                        <input type="button" class="btn btn-warning float-right" onclick="history.back();" value="Quay về" />
                        <a href="{{ route('get.list.vote',$data->id) }}" class="btn btn-info float-right m-r-5">Quản lý bầu chọn</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-material" method="post" action="">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thể loại bầu chọn</label>
                                    <select name="election_type_id" class="form-control">
                                        <option value="">--Chọn thể loại--</option>
                                        @foreach($type as $key => $val)
                                        <option @if($data->election_type_id == $val->id) selected @endif value="{{ $val->id }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <input type="text" class="form-control" readonly="" name="slug" value="{{ $data->slug }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên cuộc bầu chọn</label>
                                    <input type="text" name="title" required class="form-control" placeholder="Nhập tên cuộc bầu chọn" value="{{ $data->title }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số lượng người tham gia bầu chọn</label>
                                    <input type="number" name="voter_quality" required class="form-control" placeholder="Nhập số lượng" value="{{ $data->voter_quality }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ $data->start_date }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian bắt đầu</label>
                                    <input type="time" name="start_time" class="form-control" value="{{ $data->start_time }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ $data->end_date }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian kết thúc</label>
                                    <input type="time" name="end_time" class="form-control" value="{{ $data->end_time }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>
                                    <textarea name="content" id="editor1" cols="30" rows="10">{{ $data->content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="form-actions row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                            <button type="reset" class="btn btn-inverse">Cancel</button>    
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('get.list.object',$data->id) }}" class="btn btn-success float-right">Thêm đối tượng cho cuộc bầu chọn</a>
                            <a href="{{ route('get.create.voter',$data->id) }}" class="btn btn-success float-right m-r-5">Thêm người bầu chọn</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- Start Page Content -->
                
@endsection

@push('js')


@endpush