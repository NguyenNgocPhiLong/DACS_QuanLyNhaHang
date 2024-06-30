<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiNguoiDung;
use App\Models\User;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function DanhSachTaiKhoan(){
        return view('admin.TaiKhoan.DanhSachTaiKhoan',['TaiKhoan'=>User::all()]);
    }
    public function ThemTaiKhoan(){
        return view('admin.TaiKhoan.ThemTaiKhoan',['LoaiNguoiDung'=>LoaiNguoiDung::all()]);
    }
    public function PostThemTaiKhoan(Request $req){
        $req->merge(['password'=>bcrypt($req->password)]);
        User::create($req->all());
        return redirect()->route('danhsachtaikhoan');
    }
    public function XoaTaiKhoan($id){
        User::destroy($id);
        return redirect()->route('danhsachtaikhoan');
    }
    public function SuaTaiKhoan($id){
        $user=User::find($id);
        return view('admin.TaiKhoan.SuaTaiKhoan',['TaiKhoan'=>$user,'LoaiNguoiDung'=>LoaiNguoiDung::all()]);
    }
    public function PostSuaTaiKhoan($id,Request $req){

        $req->merge(['password'=>bcrypt($req->password)]);
        User::find($id)->update($req->all());
        return redirect()->route('danhsachtaikhoan');
    }
}
