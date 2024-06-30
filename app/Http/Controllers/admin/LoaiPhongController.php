<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function DanhSachLoaiPhong(){
        return view('admin.LoaiPhong.DanhSachLoaiPhong',['LoaiPhong'=>LoaiPhong::all()]);

    }
    public function ThemLoaiPhong(){
        return view('admin.LoaiPhong.ThemLoaiPhong');
    }
    public function PostThemLoaiPhong(Request $req){
        LoaiPhong::create($req->all());
        return redirect()->route('danhsachloaiphong');
    }
    public function SuaLoaiPhong($id){
        $loaiphong = LoaiPhong::find($id);
        return view('admin.LoaiPhong.SuaLoaiPhong',['LoaiPhong'=>$loaiphong]);
    }
    public function PostSuaLoaiPhong($id, Request $req){
        LoaiPhong::find($id)->update($req->all());
        return redirect()->route('danhsachloaiphong');
    }
    public function XoaLoaiPhong($id){
        Phong::where('id_loaiphong', $id)->delete();
        LoaiPhong::destroy($id);
        return redirect()->route('danhsachloaiphong');
    }
}
