@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản</h6>
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
                            <label>Tên tài khoản:</label>
                            <input class="form-control" placeholder="Tên tài khoản" name="name">
                        </div>
                        <div class="form-group">
                            <label>Họ Người dùng:</label>
                            <input class="form-control" placeholder="Họ Người dùng" name="Ho">
                        </div>
                        <div class="form-group">
                            <label>Tên Người dùng:</label>
                            <input class="form-control" placeholder="Tên Người dùng" name="Ten">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại:</label>
                            <input class="form-control" placeholder="Số Điện Thoại" name="SDT">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ:</label>
                            <input class="form-control" placeholder="Địa Chỉ" name="dia_chi">
                        </div>
                        <div class="form-group">
                            <label>CMND:</label>
                            <input class="form-control" placeholder="CMND" name="cmnd">
                        </div>
                        <div class="form-group">
                            <label>Ngày Vào Làm:</label>
                            <input class="form-control" id="m_date" placeholder="Ngày Vào Làm" name="ngay_vao_lam">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input class="form-control" placeholder="Mật khẩu" name="password">
                        </div>
                        <div class="form-group">
                            <label>Loại Người Dùng:</label>
                            <select name="user_id" id="input" class="form-control">
                                @foreach($LoaiNguoiDung as $item)
                                    <option value="{{ $item->id}}"> {{$item->MoTa}}</option>
                                @endforeach
                            </select>
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
    $(document).ready(function($) {
        $('#m_date').datepicker({
            'format': 'dd/mm/yyyy',
            'autoclose': true
        });
        $('#m_time').timepicker();
    });

</script>
@endsection
{{--<script src="{{url('/resources')}}/js/main.js"></script>--}}
