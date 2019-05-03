@extends('Dashboard::layouts.master')

@include('Election::election.breadcrumb')

@section('page')
        Quản lý bầu chọn
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-red">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-b-0 text-white">Danh sách phiếu bầu</h4>
                </div>
                <div class="col-md-6">
                    <input type="button" class="btn btn-warning float-right" onclick="history.back();" value="Quay về" />
                    <a href="{{ route('get.create.vote',$election->id) }}" class="btn btn-info float-right m-r-5">Quản lý phiếu bầu</a>
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
                            <th>Đối tượng bầu chọn</th>
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
@endsection
