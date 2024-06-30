<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\DatBan;
use App\Models\LoaiPhong;
use App\Models\MonAn;
use App\Models\Phong;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function get(){
        return view('client.menu',[
            "data" =>json_decode(file_get_contents(base_path("app/home.json"))),
            "MonAn" =>MonAn::all(),
            "DanhMuc"=>DanhMuc::all(),
            "Phong"=>Phong::all(),
            "LoaiPhong"=>LoaiPhong::all()
        ]);
    }
}
