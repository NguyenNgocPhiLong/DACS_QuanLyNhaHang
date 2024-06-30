<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';
    protected $fillable = ['Ten_phong','Anh','cho_trong','id_loaiphong','Mo_ta','Gia','Trang_thai'];
    public $timestamps = false;
    public function LoaiPhong(){
        return $this->belongsTo('App\Models\LoaiPhong','id_loaiphong','id');
    }
    public function datban(){
        return $this->hasMany('App\Models\DatBan','id_phong','id');
    }
}
