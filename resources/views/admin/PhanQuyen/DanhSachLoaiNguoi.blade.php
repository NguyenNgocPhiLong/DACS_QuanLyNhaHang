@extends('admin.master')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách loại người dùng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mô Tả</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($LoaiNguoiDung as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->MoTa}}</td>

                                <td style="text-align: center; width: 150px;">
                                    <a href="{{route('sualoainguoidung',[ 'id' => $item->id])}}" class="btn btn-xs btn-info"> Sửa</a>
                                    <a href="{{route('xoaloainguoidung',[ 'id' => $item->id])}}" class="btn btn-xs btn-danger"  onclick="return confirm('Bạn đồng ý xóa')"> Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{url('/resources')}}/js/demo/datatables-demo.js"></script>
@endsection
