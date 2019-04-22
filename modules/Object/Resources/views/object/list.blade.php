@extends('Dashboard::layouts.master')

@include('Election::election.breadcrumb')

@section('page')
        Danh sách đối tượng bầu cử
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-red">
        <div class="row">
            <div class="col-md-6">
                <h4 class="m-b-0 text-white">
                    Danh sách đối tượng bầu cử
                </h4>
            </div>
            <div class="col-md-6">
                <a href="{{ route('get.create.object',$election->id) }}" class="btn btn-warning float-right"><i class="icon-plus"></i> Thêm mới</a>
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
                        <th>Tên đối tượng</th>
                        <th width="100px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $val)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $val->title }}</td>
                        <td>
                            <center>
                                <a href="{{ route('get.edit.object',$val->id) }}" data-toggle="tooltip" data-original-title="Sửa"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="javascript:void(0)" alt="{{ route('get.delete.object',$val->id) }}" id="del-warning" href="#" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
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
