<?php
namespace App;
use App\Http\Controllers\Controller;
class Cart extends controller{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

//    public function __construct()
    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;
        }
    }
    public function AddCart($product,$id){
        $newProduct = ['quanty'=>0,'Gia'=>$product->Gia,'productInfor'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['Gia']=$newProduct['quanty']*$product->Gia;
        $this->products[$id]=$newProduct;
        $this->totalPrice+=$product->Gia;
        $this->totalQuanty++;
    }
    public function DeleteItemCart($id){
        $this->totalQuanty-=$this->products[$id]['quanty'];
        $this->totalPrice-=$this->products[$id]['Gia'];
        unset($this->products[$id]);
    }
    public function UpdateItemCart($id,$quanty){
        $this->totalQuanty-=$this->products[$id]['quanty'];
        $this->totalPrice-=$this->products[$id]['Gia'];
        $this->products[$id]['quanty']=$quanty;
        $this->products[$id]['Gia']=$quanty*$this->products[$id]['productInfor']->Gia;
        $this->totalQuanty+=$this->products[$id]['quanty'];
        $this->totalPrice+=$this->products[$id]['Gia'];
    }
}
?>
