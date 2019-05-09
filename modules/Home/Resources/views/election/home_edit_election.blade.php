@extends('Home::layouts.master')

@section('content')

    <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="row clearfix">

                        <div class="col-md-12">
                        

                            <div class="heading-block noborder center">
                                <h3><a href="#">{{ $data->title }}</a></h3>
                                <i class="icon-user"></i>: {{  }},<i class="icon-user"></i>: {{  }}
                            </div>
                                
                            @include('Home::layouts.notification')
                            <div class="clear"></div>

                            <div class="row clearfix">

                                <div class="col-lg-12">
                                    
                                        <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                            <ul class="tab-nav clearfix">
                                                <li><a href="#tab-feeds">Thông tin cuộc bầu chọn</a></li>
                                                <li><a href="#tab-posts">Nội dung</a></li>
                                                <li class="hidden-phone"><a href="#tab-replies">Đối tượng bầu chọn:</a></li>
                                            </ul>


                                            <div class="tab-container">

                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                <div class="tab-content clearfix" id="tab-feeds">
                                                    <div class="container">
                                                        
                                                        <div class="row">
                                                            <div class="form-group  col-sm-6">
                                                                <label for="inputEmail1">Tiêu đề:</label>
                                                                <input type="text" name="title" class="form-control" id="inputEmail1" placeholder="Nhập tên" value="{{ $data->title }}">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputEmail2">Số người tham gia:</label>
                                                                <input type="number" name="voter_quality" class="form-control" id="inputEmail2" value="{{ $data->voter_quality }}">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputEmail3">Ngày bắt đầu:</label>
                                                                <input type="date" name="start_date" class="form-control" id="inputEmail3" value="{{ $data->start_date }}">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputEmail4">Thời gian bắt đầu:</label>
                                                                <input type="time" name="start_time" class="form-control" id="inputEmail4" value="{{ $data->start_time }}">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputEmail5">Ngày kết thúc:</label>
                                                                <input type="date" name="end_date" class="form-control" id="inputEmail5" value="{{ $data->end_date }}">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputEmail6">Thời gian kết thúc:</label>
                                                                <input type="time" name="end_time" class="form-control" id="inputEmail6" value="{{ $data->end_time }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content clearfix" id="tab-posts">

                                                    <div class="container clearfix">
                                                        <div class="form-group">
                                                            <label for="inputEmail3">Thể loại:</label>
                                                            <select name="election_type_id" class="form-control" id="">
                                                                <option value="">--Chọn thể loại bầu chọn--</option>
                                                                @foreach($type as $key => $val)
                                                                <option @if($data->election_type_id == $val->id) selected @endif value="{{ $val->id }}">{{ $val->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail3">Nội dung:</label>
                                                            <textarea name="content" id="editor1" cols="30" rows="10">{{ $data->content }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-submit">
                                                        <button type="submit" class="btn btn-success m-t-30 float-right">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                                <div class="tab-content clearfix" id="tab-replies">

                                                    <div class="topmargin-sm clearfix container">
                                                        <form action="{{ route('post.home.postCreateDoiTuong') }}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                            <div class="form-group m-t-10 row" id="insert-doituong">
                                                                <div class="col-md-4">
                                                                    <label for="inputEmail3" class="m-t-10">Tên đối tượng:</label>
                                                                    <input type="text" class="form-control" id="inputEmail3" required name="title">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="inputEmail3" class="m-t-10">Hình ảnh:</label>
                                                                    <input type="file" class="form-control" id="inputEmail3" name="image">
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <input type="hidden" name="election_id" value="{{ $data->id }}">
                                                                        <button type="submit" class="btn btn-success m-t-40"><i class="icon-plus"></i> Thêm đối tượng</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                  <th>STT</th>
                                                                  <th>Tên cuộc bầu chọn</th>
                                                                  <th style="text-align: center; width: 300px">Thao tác</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($data->objects as $key => $val)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $val->title }}</td>
                                                                    <td>
                                                                        <center>
                                                                            <a href="#" class="btn btn-warning" style="color: white">Chỉnh sửa</a>
                                                                            <a href="#" class="btn btn-danger">Xóa</a>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                </div>

                            </div>

                        </div>

                        <div class="w-100 line d-block d-md-none"></div>

                    </div>

                </div>

            </div>

        </section><!-- #content end -->

@endsection

@push('js')
    <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }} "></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endpush