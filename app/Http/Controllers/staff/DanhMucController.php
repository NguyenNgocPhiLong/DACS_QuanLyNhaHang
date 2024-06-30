<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\MonAn;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function DanhSachDanhMuc(){
        return view('admin.DanhMuc.DanhSachDanhMuc',['DanhMuc'=>DanhMuc::all()]);

    }
    public function ThemDanhMuc(){
        return view('admin.DanhMuc.ThemDanhMuc');
    }
    public function PostThemDanhMuc(Request $req){
        DanhMuc::create($req->all());
        return redirect()->route('danhsachdanhmuc1');
    }
    public function SuaDanhMuc($id){
        $danhmuc = DanhMuc::find($id);
        return view('admin.DanhMuc.SuaDanhMuc',['DanhMuc'=>$danhmuc]);
    }
    public function PostSuaDanhMuc($id, Request $req) {
        DanhMuc::find($id)->update($req->all());
        return redirect()->route('danhsachdanhmuc1');
    }
}
