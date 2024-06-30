@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa phòng</h6>
            </div>
            <div class="card-body">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên phòng:</label>
                                        <input class="form-control" placeholder="Tên phòng" name="TenMonAn" value="{{$Phong->Ten_phong}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh phòng</label>
                                        <div style='width: 20%;'>
                                            <img id='HinhAnh' src='{{url('/resources/uploads/'.$Phong->Anh)}}' width="100%">
                                        </div>
                                        <input type="file" name="upload_file" onchange="readURL(this)">
                                    </div>
                                    <div class="form-group">
                                        <label>Chỗ trống:</label>
                                        <input class="form-control" placeholder="Chỗ trống" type="number" name="cho_trong" value="{{$Phong->cho_trong}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Loại phòng:</label>
                                            <select name="id_loaiphong" id="input" class="form-control"  >
                                                @foreach($LoaiPhong as $item)
                                                    <option value="{{ $item->id}}" @if($item->id==$Phong->id_loaiphong) selected @endif> {{$item->MoTa}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Giá:</label>
                                                <input class="form-control" placeholder="Giá" name="Gia" value='{{$Phong->Gia}}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <div class="select-wrap one-third">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="Trang_thai" id="" class="form-control">
                                                @if($Phong->Trang_thai==1)
                                                <option value="1">Hiển thị</option>
                                                @elseif($Phong->Trang_thai==0)
                                                <option value="0">Không hiển thị</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Sửa</button>
                                    <button type="reset" class="btn btn-danger">Xóa </button>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#HinhAnh').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
