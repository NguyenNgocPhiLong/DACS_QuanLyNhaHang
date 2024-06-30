<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatBanController extends Controller
{
    public function DanhSachDatBan() {
        return view('admin.DatBan.home', ['DatBan' => DatBan::all()]);
    }
    public function XoaDatBan($id) {
        DatBan::destroy($id);
        return redirect()->route('danhsachdatban');
    }

    public function thongke(Request $req){
        $list = DB::table('dat_ban')
            ->select(DB::raw('count(*) as num'), 'Ngay')
            ->groupBy('Ngay')
            ->get();
        foreach($list as $key => $value){
            $count = $value->num;
            $date = $value->Ngay;
            // print($date);
            // echo('</br>');
            // print_r($count);
            // echo('</br>');
        }
        return view('admin.DatBan.thongke')->with('list', $list);
    }
    // thống kê xem 1 ngày có bn bàn dặt Mỗi lần thêm bàn rồi vào thống kê xem nó sẽ cập nhật cho bạn
}
