@extends('Dashboard::layouts.master')

@include('Member::member.breadcrumb')

@section('page')
        <?php  $date = getdate(); ?>
        Danh sách thành viên trong tháng {{ $date['mon'] }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-red row">
            <div class="col-md-4">
                <h4 class="m-b-0 text-white">Danh sách thành viên</h4>
            </div>
            <div class="col-md-4">
                <form action="{{ route('get.search.member-member-on-month.admin') }}" method="get">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="search" name="key" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thành viên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Thành viên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th width="110px">Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $key => $val)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->phone }}</td>
                            <td>
                                <center>
                                    <a href="{{ route('get.edit.member',$val->id) }}" data-toggle="tooltip" data-original-title="Sửa"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="javascript:void(0)" alt="{{ route('get.delete.member',$val->id) }}" id="del-warning" href="#" data-toggle="tooltip" data-original-title="Xóa"> <i class="fa fa-close text-danger"></i> </a>
                                    <!-- <button class="btn btn-danger" action="{{ route('get.delete.member',$val->id) }}" >Xóa</button> -->
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
