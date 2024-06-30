@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm loại phòng</h6>
            </div>
            <div class="card-body">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="POST" action="" enctype="multipart/form-data" name="form1">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Mô Tả:</label>
                                        <input class="form-control" placeholder="Mô Tả" name="MoTa">
                                    </div>
                                    <button type="submit" class="btn btn-info" >Thêm</button>
                                    <button type="reset" class="btn btn-danger">Xóa </button>
                                </form>
                                <p id="thongbao"></p>
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
