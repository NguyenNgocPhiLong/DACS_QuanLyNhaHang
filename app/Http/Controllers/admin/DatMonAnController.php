<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DatMonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatMonAnController extends Controller
{
    public function DanhSachDatMonAn(){
        $nguoi = DB::table('users')
            ->join('dat_monan','id','=','dat_monan.user_id')
            ->select('name')
            ->get();
        return view('admin.DatMonAn.DanhSach',['DatMonAn'=>DatMonAn::all()])->with('nguoi',$nguoi);
    }
    public function XoaDatMonAn($id){
        DatMonAn::destroy($id);
        return redirect()->route('danhsachdatmonan');
    }
}
