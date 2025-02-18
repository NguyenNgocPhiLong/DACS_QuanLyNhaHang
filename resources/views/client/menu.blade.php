@extends('client.master')
@section('title')
    Menu
@endsection
@section('content')
    <section class="site-cover" style="background-image: url({{url('/resources')}}/img/trangchu.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-100">
                <div class="col-md-12">
                    <h1 class="site-heading site-animate mb-3">Menu</h1>
                    <h2 class="h5 site-subheading mb-5 site-animate"><span class="mr-2"><a href="{{route('trangchu')}}">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> > <span>Menu <i class="ion-ios-arrow-forward"></i></span></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="section-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5 site-animate">
                    <h2 class="display-4">Menu hấp dẫn</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">Hãy đến và thưởng thức thế giới ẩm thực của cửa hàng chúng tôi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">

                    <ul class="nav site-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
                        @for ($i=0; $i < 6 && $i < count($DanhMuc); $i++)
                            @php ($item = $DanhMuc[$i])
                            <li class="nav-item site-animate">
                                <a class="nav-link {{$i == 0?'active':''}}" id="pills-{{$item->id}}-tab" data-toggle="pill" href="#pills-{{$item->id}}" role="tab" aria-controls="pills-{{$item->id}}" aria-selected="true">{{$item->Ten_danhmuc}}</a>
                            </li>
                        @endfor
                    </ul>

                    <div class="tab-content text-left">
                        @for ($i=0; $i < 6 && $i < count($DanhMuc); $i++)
                            @php ($item = $DanhMuc[$i])
                            <div class="tab-pane fade {{$i == 0?'active show':''}}" id="pills-{{$item->id}}" role="tabpanel" aria-labelledby="pills-{{$item->id}}-tab">
                                <div class="row">
                                    @php ($monan = App\Models\MonAn::where('idDanhMuc', $item->id)->get())
                                    @for ($j = 0; $j < count($monan) ; $j++)
                                        @php ($item = $monan[$j])
                                        <div class="col-md-6 site-animate">
                                            <div class="media menu-item">
                                                <a href="">
                                                <img class="mr-3" src="{{url('/resources/uploads/'.$item->Hinhanh)}}" class="img-fluid" alt="Free Template by colorlib.com">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$item->Ten_monan}}</h5>
                                                    <p>{{$item->Mo_ta}}</p>
                                                    <h6 class="text-primary menu-price">{{number_format($item->Gia)}} VNĐ</h6>
                                                    <a onclick="AddCart({{$item->id}});" href="javascript:"  class="btn btn-outline-danger btn-lg site-animate"><i class="mdi mdi-cart">Order</i></a>
                                                </div>
                                                </a>

                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mb-5 site-animate">
                    <h2 class="display-4">Danh sách Phòng</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <p class="lead">Đây là các phòng hiện có của cửa hàng chúng tôi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">

                    <ul class="nav site-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
                        @for ($i=0; $i < 6 && $i < count($LoaiPhong); $i++)
                            @php ($item = $LoaiPhong[$i])
                            <li class="nav-item site-animate">
                                <a class="nav-link {{$i == 0?'active':''}}" id="pills-{{$item->id}}-tab" data-toggle="pill" href="#pills-{{$item->id}}" role="tab" aria-controls="pills-{{$item->id}}" aria-selected="true">{{$item->MoTa}}</a>
                            </li>
                        @endfor
                    </ul>

                    <div class="tab-content text-left">
                        @for ($i=0; $i < 6 && $i < count($LoaiPhong); $i++)
                            @php ($item = $LoaiPhong[$i])
                            <div class="tab-pane fade {{$i == 0?'active show':''}}" id="pills-{{$item->id}}" role="tabpanel" aria-labelledby="pills-{{$item->id}}-tab">
                                <div class="row">
                                    @php ($phong = App\Models\Phong::where('id_loaiphong', $item->id)->get())
                                    @for ($j = 0; $j < count($phong) ; $j++)

                                        @php ($item = $phong[$j])
                                        @if($item->Trang_thai==1 and $item->cho_trong>0)
                                        <div class="col-md-6 site-animate">
                                            <div class="media menu-item">
                                                <img class="mr-3" src="{{url('/resources/uploads/'.$item->Anh)}}" class="img-fluid" alt="Free Template by colorlib.com">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$item->Ten_phong}}</h5>
                                                    <p>{{$item->Mo_ta}}</p>
                                                    <h6 class="text-primary menu-price">{{number_format($item->Gia)}} VNĐ</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endfor

                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
