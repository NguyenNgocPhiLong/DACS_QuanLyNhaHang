<?php

namespace App\Http\Controllers\client;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\DatMonAn;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

//    public function save_cart(Request $req){
////        $productId = $req->productid_hidden;
////        $quantity = $req->qty;
////        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
////        $data['id'] = $product_info->product_id;
////        $data['qty'] = $quantity;
////        $data['name'] = $product_info->product_name;
////        $data['price'] = $product_info->product_price;
////        $data['weight'] = $product_info->product_price;
////        $data['options']['image'] = $product_info->product_image;
//        $data1=$req->all();
//        $product=MonAn::find($data1['id']);
//        $data['id'] = $product->id;
//        $data['Ten_monan'] = $product->Ten_monan;
//        $data['Gia'] = $product->Gia;
//        $data['Hinhanh'] = $product->Hinhanh;
//        Cart::add($data);
//        return redirect()->route('show-cart');
//    }
//    public function show_cart(Request $req){
//        $meta_desc = "Giỏ hàng của bạn";
//        $meta_keywords = "Giỏ hàng";
//        $meta_title = "Giỏ hàng";
//        $url_canonical = $req->url();
////        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
////        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
//        return view('client.show-cart')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with("data",json_decode(file_get_contents(base_path("app/home.json"))));
//    }


//    public function addToCart(Request $request, $id)
//    {
//        //$request->session()->flush();
//        $product = DB::select('select * from monan where id='.$id);
//        $cart = Session::get('cart');
//        $cart[$product[0]->id] = array(
//            "id" => $product[0]->id,
//            "Ten_monan" => $product[0]->Ten_monan,
//            "MoTa" => $product[0]->MoTa,
//            "Hinhanh" => $product[0]->Hinhanh,
//            "Gia" => $product[0]->Gia,
//        );
//        Session::put('cart', $cart);
//        return redirect()->back()->with('success', 'Sản phẩm đã thêm thành công!');
//    }
//    public function show(){
//        $products = Session::get('cart');
//        return view('cart', compact('products'));
//    }


    public function index(){
        $product=MonAn::all();
        dd($product);
    }
    public function addCart(Request $req,$id){
        $product = MonAn::find($id);
        //dd($id);
        if($product!=null){
            $oldcart = Session('Cart')? Session('Cart'):null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product,$id);
            //dd($newcart);
            $req->Session()->put('Cart',$newcart);
//            dd(Session('Cart'));
            return view('client.cart');
        }
    }
    public function DeleteItemCart(Request $req,$id){
        $oldcart = Session('Cart')? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->products)>0){
            $req->Session()->put('Cart',$newcart);
        }else{
            $req->Session()->forget('Cart');
        }
        return view('client.cart');
    }
    public function viewListCart(){
        return view('client.list',["data"=>json_decode(file_get_contents(base_path("app/home.json")))]);
    }
    public function DeleteListItemCart(Request $req,$id){
        $oldcart = Session('Cart')? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->products)>0){
            $req->Session()->put('Cart',$newcart);
        }else{
            $req->Session()->forget('Cart');
        }
        return view('client.list-cart');
    }
    public function SaveListItemCart(Request $req,$id,$quanty){
        $oldcart = Session('Cart')? Session('Cart'):null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($id,$quanty);
        $req->Session()->put('Cart',$newcart);
        return view('client.list-cart');
    }
    public function saveAllListItemCart(Request $req){
        foreach ($req->data as $item){
            $oldcart = Session('Cart')? Session('Cart'):null;
            $newcart = new Cart($oldcart);
            $newcart->UpdateItemCart($item["key"],$item["value"]);
            $req->Session()->put('Cart',$newcart);
        }
    }
    public function deleteAllListItemCart(Request $req){
        foreach ($req->data as $item) {
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->DeleteItemCart($item["key"]);
            if (count($newcart->products) > 0) {
                $req->Session()->put('Cart', $newcart);
            } else {
                $req->Session()->forget('Cart');
            }
        }
    }
    public function thanhtoan(){
        if(Session::has('Cart')!=null){
            return view('client.show-cart',["data"=>json_decode(file_get_contents(base_path("app/home.json")))]);
        }else{
            $error="Bạn chưa mua hàng";
            return view('client.show-cart',["data"=>json_decode(file_get_contents(base_path("app/home.json"))),"error"=>$error]);
        }

    }
    public function PostThanhtoan(Request $req){
        if(Session::has('Cart')!=null){
            $cart=Session::get('Cart')->products;
            $data=array();
            $data['user_id']=Session::get('user_id');
            $data['phuongthucthanhtoan']=$req->phuongthucthanhtoan;
            $data['Ten_khach']=$req->HoTen;
            $data['email']=$req->email;
            $data['SDT']=$req->SDT;
            $data['diachi']=$req->diachi;
            $data['ghichu']=$req->ghichu;
            $data['Tong_tien']=Session::get('Cart')->totalPrice;
            $data['Trang_thai']=1;
//            DB::table('dat_monan')->insert($data);
//            $req->merge(['user_id'=>Session::get('user_id')]);
//            $req->merge(['Tong_tien'=>Session::get('Cart')->totalPrice]);
//            $req->merge(['Ten_khach'=>$req->HoTen]);
//            $req->merge(['Trang_thai'=>1]);
//            DatMonAn::create($req->all());
            $datmonid=DB::table('dat_monan')->insertGetId($data);
            $cart1=array();
//            for ($i=0;($i<=count($cart));$i++){
//                foreach ($cart as $item){
//                $cart1["Ten_monan"] = $item['productInfor']->Ten_monan;
//                $cart1["monan_id"] = $item['productInfor']->id;
//                $cart1["soluong"] = $item['quanty'];
//                }
//            }
            foreach ($cart as $item){
                $cart1["Ten_monan"] = $item['productInfor']->Ten_monan;
                $cart1["monan_id"] = $item['productInfor']->id;
                $cart1["dat_monan_id"] = $datmonid;
                $cart1["soluong"] = $item['quanty'];
                $cart1["Gia"] = $item['Gia'];
                DB::table('dat_monan_detail')->insert($cart1);
            }
            return view('client.show-cart',["data"=>json_decode(file_get_contents(base_path("app/home.json")))]);
//            $req->merge(['monan_id'=>])
//            dd(count($cart));
//            dd(array($cart1));
//            dd($req->all(),$cart1);


        }
        else{
            $error="Bạn chưa mua hàng";
            return view('client.show-cart',["data"=>json_decode(file_get_contents(base_path("app/home.json"))),"error"=>$error]);
        }
    }
}
