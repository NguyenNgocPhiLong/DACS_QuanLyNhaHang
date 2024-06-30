@extends('admin.master')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách sự kiện</h6>
            </div>
            <?php
            use Illuminate\Support\Facades\Session;
            $mes=Session::get('id');
            $mes1=Session::get('user_id')
            ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sự kiện</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Người đặt lịch</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($Events as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->start}}</td>
                                <td>{{$item->end}}</td>

                                    @foreach($Users as $item1)
                                        @if($item1->id==$item->user_id)
                                            @php($var = $item1->name)
{{--                                            <td>{{$item->user_id}}--}}
{{--                                                {{$item1->id}}--}}
{{--                                                {{$item1->user_id}}--}}
{{--                                                {{$item1->name}}--}}
{{--                                            </td>--}}

{{--                                            <td></td>--}}
                                        @endif
                                    @endforeach
                                <td>{{$var}}</td>
{{--                                    @foreach($Users as $item1)--}}
{{--                                        <option  @if($item1->id==$item->user_id) @endif> {{$item1->Ten}}</option>--}}
{{--                                    @endforeach--}}

                                <td style="text-align: center; width: 150px;">
                                    @if($item->user_id == $mes1)
                                    <a href="{{route('sualich',[ 'id' => $item->id])}}" class="btn btn-xs btn-info"> Sửa</a>

                                    <a href="{{route('xoalich',[ 'id' => $item->id])}}" class="btn btn-xs btn-danger"  onclick="return confirm('Bạn đồng ý xóa')"> Xóa</a>
                                    @endif
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
