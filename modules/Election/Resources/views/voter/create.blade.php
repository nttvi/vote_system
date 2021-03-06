@extends('Dashboard::layouts.master')

@include('Election::voter.breadcrumb')

@section('page')
        Thêm mới người tham gia bầu chọn
@endsection

@section('content')
        <div class="card">
            <div class="card-header bg-red">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-0 text-white">Thêm người tham gia bầu chọn</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('get.edit.election',$election->id) }}" class="btn btn-warning float-right"><i class="fas fa-undo-alt"></i> Về trang chỉnh sửa</a>
                        <a href="{{ route('get.create.vote',$election->id) }}" class="btn btn-info float-right m-r-5">Quản lý phiếu bầu</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>
                    <a href="{{ route('get.edit.election',$election->id) }}" style="color: #13b7b7" >{{ $election->getTitle() }}</a>
                </h3>
                <form class="form-material" method="post" action="" >
                 {{ csrf_field() }}
                    <div class="form-body">
                        <div class="p-t-20 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên người tham gia bầu chọn</label>
                                    <select name="member_id" class="form-control select2" id="">
                                        <option value="">Chọn người tham gia</option>
                                        @foreach($members as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="election_id" class="form-control" value="{{ $election->id }}">
                                    <br>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                </form>
            </div>
        </div>

        @include('Election::voter.list')                
@endsection

@push('js')


@endpush