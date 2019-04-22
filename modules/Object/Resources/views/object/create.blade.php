@extends('Dashboard::layouts.master')

@include('Object::object.breadcrumb')

@section('page')
        Thêm mới đối tượng cuộc bầu cử
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
                        <h4 class="m-b-0 text-white">Thêm đối tượng cuộc bầu cử</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('get.list.object',$election->id) }}" class="btn btn-warning float-right"> Về danh sách đối tượng</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>
                    <a href="{{ route('get.edit.election',$election->id) }}" style="color: #13b7b7" >{{ $election->getTitle() }}</a>
                </h3>
                <form class="form-material" method="post" action="" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên đối tượng cuộc bầu cử</label>
                                    <input type="text" name="title" required class="form-control" placeholder="Nhập tên đối tượng cuộc bầu cử" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thêm hình ảnh</label>
                                    <input type="file" name="image" required class="form-control" value="{{ old('image ') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mô tả</label>
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ old('description ') }}</textarea>
                                </div>
                            </div>

                            <input type="hidden" name="election_id" class="form-control" value="{{ $election->id }}">
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