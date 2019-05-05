@extends('Dashboard::layouts.master')

@include('Member::member.breadcrumb')

@section('page')
        Danh sách cuộc bầu chọn
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-red">
            <div class="card-header bg-red row">
                <div class="col-md-6">
                    <h4 class="m-b-0 text-white">Danh sách cuộc bầu chọn</h4>
                </div>
                <div class="col-md-6">
                    <input type="button" class="btn btn-warning float-right" onclick="history.back();" value="Quay về" />
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Cuộc bầu chọn</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $val)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $val->election->title }}</td>
                            <td>{{ $val->election->start_date }} {{ $val->election->start_time }}</td>
                            <td>{{ $val->election->end_date }} {{ $val->election->end_time }}</td>
                            <td>
                                <center>
                                    <a href="{{ route('get.edit.election',$val->election_id) }}" data-toggle="tooltip" data-original-title="Sửa"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <!-- <button class="btn btn-danger" action="{{ route('get.delete.election',$val->id) }}" >Xóa</button> -->
                                </center>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
