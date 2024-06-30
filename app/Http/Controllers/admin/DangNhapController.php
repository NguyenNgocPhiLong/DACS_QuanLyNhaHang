<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DangNhapController extends Controller
{
    public function DangNhap(){
        if(Auth::check())
            return redirect('admin');
        else
            return view('client.trangchu',[
                "data" => json_decode(file_get_contents(base_path("app/home.json"))),"Phong"=>Phong::all()
            ]);
    }
    public function PostDangNhap(Request $req){
        $req1='';
        Auth::attempt(['name'=>$req->username,'password' =>$req->password]);
        $result = DB::table('users')
            ->select('user_id as num')
            ->where('name','=',$req->username)->get();
        $id=DB::table('users')->select('id as num')->where('name','=',$req->username)->get();
        if(Auth::check()){
            foreach($result as $key => $value) {//co the dung Auth::user()->user_id;
                $count = $value->num;
                foreach ($id as $key1 =>$value1){
                    $user_id = $value1->num;
                    Session::put('user_id',$user_id);
                }
                if($count==2){
                    Session::put('id',$count);
                    return redirect('admin');}
                elseif ($count==3){
                    Session::put('id',$count);
                    return redirect('staff');}
                else{
                    Session::put('id',$count);
                    return redirect('client');}
            }

        }else{
            return view('client.trangchu',['error'=>$req],["data" => json_decode(file_get_contents(base_path("app/home.json"))),"Phong"=>Phong::all()],);
        }
    }
    public function DangXuat(Request $req){
        Auth::logout();
        $req->session()->forget(['user_id','id']);
        return redirect('dangnhap');
    }
}
