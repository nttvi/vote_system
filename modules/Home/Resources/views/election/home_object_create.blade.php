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