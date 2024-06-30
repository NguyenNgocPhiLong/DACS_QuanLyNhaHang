<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;


use App\Models\LoaiNguoiDung;
use App\Models\User;
use Illuminate\Http\Request;

class LoaiNguoiDungController extends Controller
{
    public function DanhSachLoaiNguoiDung(){
        return view('admin.PhanQuyen.DanhSachLoaiNguoi',['LoaiNguoiDung'=>LoaiNguoiDung::all()]);

    }
    public function ThemLoaiNguoiDung(){
        return view('admin.PhanQuyen.ThemLoaiNguoi');
    }
    public function PostThemLoaiNguoiDung(Request $req){
        LoaiNguoiDung::create($req->all());
        return redirect()->route('danhsachloainguoidung');
    }
    public function SuaLoaiNguoiDung($id){
        $loainguoi = LoaiNguoiDung::find($id);
        return view('admin.PhanQuyen.SuaLoaiNguoiDung',['LoaiNguoiDung'=>$loainguoi]);
    }
    public function PostSuaLoaiNguoiDung($id, Request $req) {
        LoaiNguoiDung::find($id)->update($req->all());
        return redirect()->route('danhsachloainguoidung');
    }
    public function XoaLoaiNguoiDung($id) {
        User::where('user_id', $id)->delete();
        LoaiNguoiDung::destroy($id);
        return redirect()->route('danhsachloainguoidung');
    }
}
