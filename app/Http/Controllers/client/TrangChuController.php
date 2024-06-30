<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\MonAn;
use App\Models\Phong;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class TrangChuController extends Controller
{
    public function get(){
        return view('client.trangchu', [
            "data" => json_decode(file_get_contents(base_path("app/home.json"))),
            "MoAn" => MonAn::all(),
            "Phong"=>Phong::all()
        ]);
    }
    public function Post(Request $req){
        try {
            $date = explode("/",$req->Ngay);
            $req->merge(['Ngay' => new DateTime($date[2].'/'.$date[1] . '/' . $date[0])]);
            $req->merge(['Gio'=> new DateTime($req->Gio)]);
            DatBan::created($req->all());
            return view('client.datban',[
                "data" =>json_decode(file_get_contents(base_path("app/home.json"))),
                "DatBan" =>$req
            ]);
        } catch (\Exception $e) {
            return view('client.datban',[
                "data"=>json_decode(file_get_contents(base_path("app/home.json"))),
                "error"=>"Ngày giờ không đúng định dạng"
            ]);
        }
    }

    public function gioithieu(){
        return view('client.gioithieu',[
            "data" =>json_decode(file_get_contents(base_path("app/home.json"))),
            "MoAn" =>MonAn::all(),
            "khachhang" =>json_decode(file_get_contents(base_path("app/home.json"))),
            "daubep" =>json_decode(file_get_contents(base_path("app/home.json")))
        ]);
    }
    public function datban(){
        return view('client.datban',[
            "data" =>json_decode(file_get_contents(base_path("app/home.json"))),
            "Phong"=>Phong::all()
        ]);
    }
}
