<nav class="navbar navbar-expand-lg navbar-dark site_navbar bg-dark site-navbar-light" id="site-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('trangchu')}}">{{$data->TenNhaHang}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="site-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{\Route::current()->getName() == 'trangchu'?'active':''}}"><a href="{{route('trangchu')}}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item {{\Route::current()->getName() == 'gioithieu'?'active':''}}"><a href="{{route('gioithieu')}}" class="nav-link">Giới thiệu</a></li>
                <li class="nav-item {{\Route::current()->getName() == 'menu'?'active':''}}"><a href="{{route('menu')}}" class="nav-link">Menu</a></li>
                <li class="nav-item {{\Route::current()->getName() == 'datban'?'active':''}}"><a href="{{route('datban')}}" class="nav-link">Đặt bàn</a></li>
{{--                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">--}}
{{--                    <span class="mdi mdi-account">Tai Khoan</span>--}}
{{--                </button>--}}
{{--                <li class="nav-item {{\Route::current()->getName() == 'dangnhap'?'active':''}} " ><a data-toggle="modal" data-target=".bd-example-modal-lg" href="{{route('dangnhap')}}" class="nav-link" >Dang nhap</a></li>--}}
                <?php
                    $customer_id = Session::get('user_id');
                    if ($customer_id!=NULL){

                    ?>
                <li class="nav-item "><a href="{{route('homeadmin')}}" class="nav-link" ><i class="mdi mdi-account">Tai khoan {{Auth::user()->name}}</i> </a></li>

                <?php
                }else{
                ?>
                <li class="nav-item {{\Route::current()->getName() == 'dangnhap'?'active':''}}"><a href="{{route('dangnhap')}}" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="mdi mdi-account"></i> </a></li>
{{--                <li class="nav-item {{\Route::current()->getName() == 'dangnhap'?'active':''}}"><a href="{{route('dangnhap')}}" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">Tai khoan</a></li>--}}
<?php
                }
?>

                <li class="nav-item">
                    {{--                    <div class="col-lg-3 text-right col-md-3">--}}
                    <ul class="nav-right nav-link" style="list-style-type: none; ">
                        <li class="cart-icon"><a href="#" class="nav-link">
                                <i class="mdi mdi-cart"></i>
                                @if(Session::has("Cart")!=null)
                                    <span id="total-quanty-show">{{Session::get("Cart")->totalQuanty}}</span>
                                @else
                                    <span id="total-quanty-show">0</span>
                                @endif
                            </a>
                            <div class="cart-hover">
                                <div id="change-item-cart">
                                    @if(Session::has("Cart")!=null)
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                @foreach(Session::get("Cart")->products as $item)
                                                    <tr>
                                                        <td class="si-pic"><img src="{{url('/resources/uploads/'.$item['productInfor']->Hinhanh)}}" alt="" width="100"></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format($item['productInfor']->Gia)}} x {{$item['quanty']}}</p>
                                                                <h6>{{$item['productInfor']->Ten_monan}}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="mdi mdi-close" data-id="{{$item['productInfor']->id}}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>₫{{number_format(Session::get("Cart")->totalPrice)}}</h5>
                                        </div>
                                    @endif

                                </div>
                                <div class="select-button">
                                    <a href="{{route('list-cart')}}" class="btn primary-btn view-card">VIEW CARD</a>
                                    <a href="{{route('Thanhtoan')}}" class="btn primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    {{--                    </div>--}}
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
{{--            <ul>--}}
{{--                <div class="text-center">--}}
{{--                    <h1 class="h4 text-gray-900 mb-4">Chào mừng!</h1>--}}
{{--                </div>--}}
{{--                <li>--}}
{{--                    <div id="wrapper">--}}
{{--                        <form action="" id="form-login">--}}
{{--                            <h1 class="form-heading">Form đăng nhập</h1>--}}
{{--                            <div class="form-group">--}}
{{--                                <i class="far fa-user"></i>--}}
{{--                                <input type="text" class="form-input" placeholder="Tên đăng nhập">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <i class="fas fa-key"></i>--}}
{{--                                <input type="password" class="form-input" placeholder="Mật khẩu">--}}
{{--                                <div id="eye">--}}
{{--                                    <i class="far fa-eye"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="submit" value="Đăng nhập" class="form-submit">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}



                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
{{--                                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>--}}
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h3>Khách hàng mới</h3>
                                                <p>Nếu bạn chưa có tài khoản, vui lòng đăng ký!</p>
                                            </div>
                                            <form class="user" method="POST" action="{{url('/')}}/dangki">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Tên tài khoản" name="name" id="name"required>
                                                        <div id="nameList"></div>
                                                    </div>
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="SDT" name="SDT" required pattern="[0-9]+" minlength="10">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password" minlength="6" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Nhập lại Mật khẩu" name="check_password" minlength="6" required>
                                                    </div>
                                                </div>
                                                <input type="submit" class="btn btn-info" value="Đăng ký">

                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Chào mừng!</h1>
                                                <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập!</p>

                                                <?php
                                                use Illuminate\Support\Facades\Session;
                                                $message = Session::get('message');
                                                if($message){
                                                    echo'<span class="text-alert">'.$message.'</span>';
                                                    Session::put('message',null);
                                                }
                                                ?>
                                            </div>
                                            <form class="user" method="POST" action="{{url('/')}}/dangnhap">
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

                                                <input type="submit" class="btn btn-primary btn-user btn-block " value="Đăng nhập">
{{--                                                <button type="button" class="btn btn-info btn-user btn-block  {{\Route::current()->getName() == 'trangchu'?'active':''}}">--}}
{{--                                                    <a href="{{route('trangchu')}}" class="link-light">Trang chủ</a></button>--}}
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
<style>
    .nav-right li.cart-icon {
        position: relative;
    }

    .nav-right li.cart-icon:hover .cart-hover {
        opacity: 1;
        visibility: visible;
        top: 60px;
    }

    .nav-right li.cart-icon a {
        color:#0b0b0b;
        position: relative;
        display: inline-block;
        margin-top:-10px;
    }

    .nav-right li.cart-icon a span {
        position: absolute;
        right: -8px;
        top: -1px;
        height: 15px;
        width: 15px;
        background: #e7ab3c;
        color: #ffffff;
        border-radius: 50%;
        font-size: 11px;
        font-weight: 700;
        text-align: center;
        line-height: 15px;
    }

    .nav-right li.cart-icon .cart-hover {
        position: absolute;
        right: -70px;
        top: 100px;
        width: 350px;
        background: #ffffff;
        z-index: 99;
        text-align: left;
        padding: 30px;
        opacity: 0;
        visibility: hidden;
        -webkit-box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
        box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .nav-right li.cart-icon .cart-hover .select-items table {
        width: 100%;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td {
        padding-bottom: 20px;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-pic img {
        border: 1px solid #ebebeb;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text {
        padding-left: 18px;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text .product-selected p {
        color: #e7ab3c;
        line-height: 30px;
        margin-bottom: 7px;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text .product-selected h6 {
        color: #232530;
    }

    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-close {
        color: #252525;
        font-size: 16px;
        cursor: pointer;
    }

    .nav-right li.cart-icon .cart-hover .select-total {
        overflow: hidden;
        border-top: 1px solid #e5e5e5;
        padding-top: 26px;
        margin-bottom: 30px;
    }

    .nav-right li.cart-icon .cart-hover .select-total span {
        font-size: 14px;
        color: #e7ab3c;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        float: left;
    }

    .nav-right li.cart-icon .cart-hover .select-total h5 {
        color: #e7ab3c;
        float: right;
    }

    .nav-right li.cart-icon .cart-hover .select-button .view-card {
        font-size: 12px;
        letter-spacing: 2px;
        display: block;
        text-align: center;
        background: #191919;
        color: #806520;
        padding: 15px 30px 12px;
        margin-bottom: 10px;
    }

    .nav-right li.cart-icon .cart-hover .select-button .checkout-btn {
        font-size: 12px;
        letter-spacing: 2px;
        display: block;
        text-align: center;
        background: #806520;
        color: #2d3748;
        padding: 15px 30px 12px;
    }

    .nav-right li.heart-icon a {
        color: #252525;
        position: relative;
        display: inline-block;
    }

    .nav-right li.heart-icon a span {
        position: absolute;
        right: -8px;
        top: -1px;
        height: 15px;
        width: 15px;
        background: #ffffff;
        color: #ffffff;
        border-radius: 50%;
        font-size: 11px;
        font-weight: 700;
        text-align: center;
        line-height: 15px;
    }
    .product-details .pd-title .heart-icon {
        color: #252525;
        font-size: 18px;
        position: absolute;
        right: 0;
        top: 0;
    }


    .nav-right li.cart-icon .cart-hover .select-button .view-card {
        font-size: 12px;
        letter-spacing: 2px;
        display: block;
        text-align: center;
        background: #191919;
        color: #ffffff;
        padding: 15px 30px 12px;
        margin-bottom: 10px;
    }

    .nav-right li.cart-icon .cart-hover .select-button .checkout-btn {
        font-size: 12px;
        letter-spacing: 2px;
        display: block;
        text-align: center;
        color: #ffffff;
        padding: 15px 30px 12px;
    }
    .nav-right li.cart-icon .cart-hover .select-items table tr td.si-close {
        color: #252525;
        font-size: 16px;
        cursor: pointer;
    }

</style>
<script>
    $(document).ready(function(){

        $('#name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{query:query, _token:_token},
                    success:function(data){ //dữ liệu nhận về
                        $('#nameList').fadeIn();
                        $('#nameList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#name').val($(this).text());
            $('#nameList').fadeOut();
        });

    });
</script>

