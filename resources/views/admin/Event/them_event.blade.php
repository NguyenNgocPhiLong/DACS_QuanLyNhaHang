@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm sự kiện</h6>
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
                                        <label>Tên sự kiện:</label>
                                        <input class="form-control" placeholder="Tên sự kiện" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Bắt đầu:</label>
                                        <input type="date" class="form-control" placeholder="Bắt đầu" name="start">
                                    </div>
                                    <div class="form-group">
                                        <label>Kết thúc:</label>
                                        <input type="date" class="form-control" placeholder="Kết thúc" name="end">
                                    </div>
                                    <button type="submit" class="btn btn-info">Thêm</button>
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
