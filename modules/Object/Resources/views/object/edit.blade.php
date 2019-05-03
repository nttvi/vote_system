@extends('Dashboard::layouts.master')

@include('Object::object.breadcrumb')

@section('page')
        Chỉnh sửa tượng cuộc bầu cử
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
                        <h4 class="m-b-0 text-white">Chỉnh sửa tượng cuộc bầu cử</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('get.list.object',$data->election_id) }}" class="btn btn-warning float-right"><i class="fas fa-undo-alt"></i> Về danh sách đối tượng</a>
                        <a href="{{ route('get.create.vote',$data->election_id) }}" class="btn btn-info float-right m-r-5">Quản lý phiếu bầu</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>
                    <a href="{{ route('get.edit.election',$data->election_id) }}" style="color: #13b7b7" >{{ $data->election->getTitle() }}</a>
                </h3>
                <form class="form-material" method="post" action="" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đối tượng cuộc bầu cử</label>
                                        <input type="text" name="title" required class="form-control" placeholder="Nhập tên đối tượng cuộc bầu cử" value="{{ $data->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mô tả</label>
                                        <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Hình ảnh</label>
                                        <div class="col-md-6">
                                            <img src="{{ asset($data->image) }}" alt="object" width="100%">
                                        </div>
                                        <br>
                                        <input type="file" name="image" class="form-control" value="{{ $data->image }}">
                                    </div>
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
