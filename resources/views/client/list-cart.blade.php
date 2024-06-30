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
                        <li class="subtotal">Quanty <span>{{Session::get("Cart")->totalQuanty}}</span></li>
                        <li class="cart-total">Total <span>{{{number_format(Session::get("Cart")->totalPrice)}}}d</span></li>
                    </ul>
                    <a href="{{route('Thanhtoan')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                @endif
                    <input hidden id="total-quanty-cart1" type="number" value="{{Session::get("Cart")->totalQuanty}}">
            </div>
        </div>
    </div>
</div>
<script>
    /*-------------------
           Quantity change
       --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
