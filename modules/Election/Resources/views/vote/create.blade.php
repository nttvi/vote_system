@extends('Dashboard::layouts.master')

@include('Election::vote.breadcrumb')

@section('page')
        Thêm phiếu bầu
@endsection

@section('content')
        <div class="card">
            <div class="card-header bg-red">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-0 text-white">Thêm phiếu bầu</h4>
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
                                    <label class="control-label">Tên người bầu cử</label>
                                    <select name="voter_id" class="form-control select2" id="">
                                        <option value="">Chọn người tham gia</option>
                                        @foreach($voters as $key => $val)
                                        <option value="{{ $val->id }}">{{ memberName($val->member_id) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đối tượng bầu cử</label>
                                    @foreach($objects as $key => $val)
                                    <br>
                                    <input type="checkbox" name="object_id[]" value="{{ $val->id }}"> {{ $val->title }}
                                    @endforeach
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

        <div class="card">
            <div class="card-header bg-red">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-0 text-white">Danh sách phiếu bầu</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('get.create.vote',$election->id) }}" class="btn btn-warning float-right">Quản lý phiếu bầu</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>
                    <a href="{{ route('get.edit.election',$election->id) }}" style="color: #13b7b7" >{{ $election->getTitle() }}</a>
                </h3>
                <div class="table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Đối tượng bầu cử</th>
                                <th>Số phiếu bầu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objects as $key => $val)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->title }}</td>
                                <td>{{ countVote($val->id,$election->id) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-red">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-0 text-white">Danh sách người bầu chọn</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người bầu cử</th>
                                <th>Đối tượng được bầu chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voters as $key => $val)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ memberName($val->member_id) }}</td>
                                <td>
                                    {{ vote($val->id,$election->id) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection

@push('js')


@endpush