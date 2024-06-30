<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatMonAn extends Model
{
    protected $table = 'dat_monan';
    protected $fillable = ['user_id','phuongthucthanhtoan','Ten_khach','email','dia_chi','ghichu','Tong_tien','Trang_thai'];
    public $timestamps = false;
    public function User(){
        return $this->belongsTo('App\Models\User','id','user_id');
    }

}
