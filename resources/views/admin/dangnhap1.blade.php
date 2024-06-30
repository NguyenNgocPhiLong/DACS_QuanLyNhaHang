@extends('client.trangchu')
@section('title')
    Nhà hàng {{$data->TenNhaHang}}
@endsection

<div class="container">
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <ul>
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chào mừng!</h1>
                </div>
                <li>
                    <div id="wrapper">
                        <form action="" id="form-login">
                            <h1 class="form-heading">Form đăng nhập</h1>
                            <div class="form-group">
                                <i class="far fa-user"></i>
                                <input type="text" class="form-input" placeholder="Tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-key"></i>
                                <input type="password" class="form-input" placeholder="Mật khẩu">
                                <div id="eye">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                            <input type="submit" value="Đăng nhập" class="form-submit">
                        </form>
                    </div>
                </li>
            </ul>



                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Chào mừng!</h1>
                                            </div>
                                            <form class="user" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tên tài khoản" name="username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu" name="password">
                                                </div>
                                                @isset($error)
                                                    <div class="form-group">
                                                        <div class="card bg-danger text-white shadow">
                                                            <div class="card-body">
                                                                {{$error}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset

                                                <input type="submit" class="btn btn-primary btn-user btn-block {{\Route::current()->getName() == 'dangnhap'?'active':''}}" value="Đăng nhập" href="{{route('dangnhap')}}">
                                                <button type="button" class="btn btn-info btn-user btn-block  {{\Route::current()->getName() == 'trangchu'?'active':''}}">
                                                    <a href="{{route('trangchu')}}" class="link-light">Trang chủ</a></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

