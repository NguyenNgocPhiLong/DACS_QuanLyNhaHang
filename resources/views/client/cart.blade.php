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
    <input hidden id="total-quanty-cart" type="number" value="{{Session::get("Cart")->totalQuanty}}">
</div>

@endif
