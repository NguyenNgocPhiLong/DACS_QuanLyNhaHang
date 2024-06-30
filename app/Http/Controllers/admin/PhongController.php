<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function DanhSachPhong(){
        return view('admin.Phong.DanhSachPhong',['Phong'=>Phong::paginate(12)]);
    }
    public function ThemPhong(){
        return view('admin.Phong.ThemPhong',['LoaiPhong'=>LoaiPhong::all()]);
    }
    public function PostThemPhong(Request $req){
//        $file_name='';
//        if($req->hasFile('upload_file')){
//            $file = $req->file('upload_file');
//            $file_name = $file->getClientOriginalName();
//            $name_image = current(explode('.',$file_name));
//            $file_name =  $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
//            $file->move('resources/uploads/',$file_name);
//        }
//        $req->merge(['Anh'=>$file_name]);
        $file_name = '';
        if($req->hasFile('upload_file')){
            $file = $req->file('upload_file');
//            $file_name = date('Y-m-d-h-i-s').$file->getClientOriginalName();
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/'),$file_name);
        }
        $req->merge(['Anh'=>$file_name]);
        Phong::create($req->all());
        return redirect()->route('danhsachphong');
    }
    public function SuaPhong($id){
        $phong = Phong::find($id);
        return view('admin.Phong.SuaPhong',['Phong'=>$phong,'LoaiPhong'=>LoaiPhong::all()]);
    }
    public function PostSuaPhong($id, Request $req){
//        $file_name='';
//        if($req->hasFile('upload_file')){
//            $file=$req->file('upload_file');
//            $file_name = $file->getClientOriginalName();
//            $name_image = current(explode('.',$file_name));
//            $file_name =  $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
//            $file->move('uploads/',$file_name);
//        }
//        $req->merge(['Anh'=>$file_name]);
        $file_name = '';
        if($req->hasFile('upload_file')){
            $file = $req->file('upload_file');
//            $file_name = date('Y-m-d-h-i-s').$file->getClientOriginalName();
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/'),$file_name);
        }
        $req->merge(['Anh'=>$file_name]);
        Phong::find($id)->update($req->all());
        return redirect()->route('danhsachphong');
    }
    public function XoaPhong($id){
        DatBan::where('id_phong',$id)->delete();
        Phong::destroy($id);
        return redirect()->route('danhsachphong');
    }
}
