<form action="{{ route('post.home.postEditDoiTuong',$val->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group m-t-10 row" id="insert-doituong">
        <div class="col-md-12">
            <img src="{{ asset($val->image) }}" alt="" width="100%">
        </div>
        <div class="col-md-4">
            <label class="m-t-10">Tên đối tượng:</label>
            <input type="text" class="form-control" required name="title" value="{{ $val->title }}">
        </div>
        <div class="col-md-4">
            <label  class="m-t-10">Hình ảnh:</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="col-md-4">
                <input type="hidden" name="election_id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-success m-t-40"><i class="icon-check"></i> Lưu</button>
        </div>
    </div>
</form>