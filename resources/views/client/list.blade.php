@extends('client.master')
@section('title')
    Đặt bàn
@endsection
@section('content')
    <section class="site-cover" style="background-image: url({{url('/resources')}}/img/trangchu.jpg);" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center site-vh-100">
                <div class="col-md-12">
                    <h1 class="site-heading site-animate mb-3">Đặt bàn</h1>
                    <h2 class="h5 site-subheading mb-5 site-animate"><span class="mr-2"><a href="{{route('trangchu')}}">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> > <span>Đặt bàn <i class="ion-ios-arrow-forward"></i></span></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="section-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">

                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Save</th>
                                <th>Delete</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="close-td first-row edit-all"> <i class="mdi mdi-content-save"></i></th>
                                <th class="close-td first-row delete-all"><i class="mdi mdi-close"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has("Cart")!=null)
                                @foreach(Session::get("Cart")->products as $item)
                                    <tr>
                                        <td class="cart-pic"><img src="{{url('/resources/uploads/'.$item['productInfor']->Hinhanh)}}" alt=""></td>
                                        <td class="cart-title">
                                            <h5>{{$item['productInfor']->Ten_monan}}</h5>
                                        </td>
                                        <td class="p-price">{{{number_format($item['productInfor']->Gia)}}}</td>
                                        <td class="qua-col">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input data-id="{{$item['productInfor']->id}}" id="quanty-item-{{$item['productInfor']->id}}" type="text" value="{{$item['quanty']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price">{{number_format($item['Gia'])}}d</td>
                                        <td class="close-td"><i class="mdi mdi-content-save" onclick="SaveListItemCart({{$item['productInfor']->id}})"></i></td>
                                        <td class="close-td"><i class="mdi mdi-close" onclick="DeleteListItemCart({{$item['productInfor']->id}})"></i></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if(Session::has("Cart")!=null)
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{Session::get("Cart")->totalQuanty}}</span></li>
                                    <li class="cart-total">Total <span>{{{number_format(Session::get("Cart")->totalPrice)}}}d</span></li>
                                </ul>
                                <a href="{{route('Thanhtoan')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <style>

        .cart-table table tr td.cart-pic img{
            width: 50%;
        }
        .cart-table {
            margin-bottom: 40px;
        }

        .cart-table table {
            width: 100%;
            min-width: 480px;
            border: 1px solid #ebebeb;
        }

        .cart-table table tr th {
            font-size: 16px;
            color: #252525;
            font-weight: 700;
            border-bottom: 1px solid #ebebeb;
            text-align: center;
            padding: 18px 0 19px;
            text-transform: uppercase;
        }

        .cart-table table tr th.p-name {
            text-align: left;
        }

        .cart-table table tr td {
            text-align: center;
            padding-bottom: 34px;
        }

        .cart-table table tr td.first-row {
            padding-top: 30px;
        }

        .cart-table table tr td.cart-pic {
            width: 21%;
        }

        .cart-table table tr td.cart-title {
            text-align: left;
        }

        .cart-table table tr td.cart-title h5 {
            color: #252525;
        }

        .cart-table table tr td.p-price {
            width: 16%;
        }

        .cart-table table tr td.p-price,
        .cart-table table tr td.total-price {
            color: #e7ab3c;
            font-size: 16px;
            font-weight: 700;
        }

        .cart-table table tr td.qua-col {
            width: 16%;
        }


        .cart-table table tr td.qua-col .pro-qty {
            width: 123px;
            height: 46px;
            border: 2px solid #ebebeb;
            padding: 0 15px;
            float: left;
        }

        .cart-table table tr td.qua-col .pro-qty .qtybtn {
            font-size: 24px;
            color: #b2b2b2;
            float: left;
            line-height: 38px;
            cursor: pointer;
            width: 18px;
        }

        .cart-table table tr td.qua-col .pro-qty .qtybtn.dec {
            font-size: 30px;
        }

        .cart-table table tr td.qua-col .pro-qty input {
            text-align: center;
            width: 52px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            color: #4c4c4c;
            line-height: 40px;
            float: left;
        }

        .cart-table table tr td.total-price {
            width: 12%;
        }

        .cart-table table tr td.close-td {
            font-size: 16px;
            color: #252525;
            width: 8%;
        }

        .cart-table table tr td.close-td i {
            cursor: pointer;
        }



        .proceed-checkout ul {
            border: 2px solid #ebebeb;
            background: #f3f3f3;
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 16px;
            padding-bottom: 20px;
        }

        .proceed-checkout ul li {
            list-style: none;
            font-size: 16px;
            font-weight: 700;
            color: #252525;
            text-transform: uppercase;
            overflow: hidden;
        }

        .proceed-checkout ul li.subtotal {
            font-weight: 400;
            text-transform: capitalize;
            border-bottom: 1px solid #ffffff;
            padding-bottom: 14px;
        }

        .proceed-checkout ul li.subtotal span {
            font-weight: 700;
        }

        .proceed-checkout ul li.cart-total {
            padding-top: 10px;
        }

        .proceed-checkout ul li.cart-total span {
            color: #e7ab3c;
        }

        .proceed-checkout ul li span {
            float: right;
        }

        .proceed-checkout .proceed-btn {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            background: #252525;
            text-transform: uppercase;
            padding: 15px 25px 14px 25px;
            display: block;
            text-align: center;
        }

        .spad {
            padding-top: 100px;
            padding-bottom: 100px;
        }


        .product-details .quantity {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 33px;
        }

        .product-details .quantity .pro-qty {
            width: 123px;
            height: 46px;
            border: 2px solid #ebebeb;
            padding: 0 15px;
            float: left;
            margin-right: 14px;
        }

        .product-details .quantity .pro-qty .qtybtn {
            font-size: 24px;
            color: #b2b2b2;
            float: left;
            line-height: 38px;
            cursor: pointer;
            width: 18px;
        }

        .product-details .quantity .pro-qty .qtybtn.dec {
            font-size: 30px;
        }

        .product-details .quantity .pro-qty input {
            text-align: center;
            width: 52px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            color: #4c4c4c;
            line-height: 40px;
            float: left;
        }

        .product-details .quantity .primary-btn.pd-cart {
            padding: 14px 70px 10px;
        }
        .cart-table table tr td.qua-col .quantity {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .product-details .quantity .primary-btn.pd-cart {
            padding: 14px 30px 10px;
        }
        .product-details .quantity .primary-btn.pd-cart {
            padding: 14px 20px 10px;
        }
    </style>
    <script>


    </script>
@endsection
