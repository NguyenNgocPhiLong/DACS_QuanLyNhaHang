<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\LoaiNguoiDung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaiKhoanController extends Controller
{
    public function DanhSachTaiKhoan(){
        $user = Session::get('id');
        $taikhoan = DB::table('users')->select('*')->where('id','=',$user)->get();
        return view('admin.TaiKhoan.DanhSachTaiKhoan',['TaiKhoan'=>$taikhoan]);
    }
    public function SuaTaiKhoan($id){
        $user=User::find($id);
        return view('admin.TaiKhoan.SuaTaiKhoan',['TaiKhoan'=>$user,'LoaiNguoiDung'=>LoaiNguoiDung::all()]);
    }
    public function PostSuaTaiKhoan($id,Request $req){
        User::find($id)->update($req->all());
        return redirect()->route('danhsachtaikhoannhanvien');
    }
}
