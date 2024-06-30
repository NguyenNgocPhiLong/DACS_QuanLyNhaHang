<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiNguoiDung extends Model
{
    protected $table = 'loai_nguoidung';
    protected $fillable = ['Mo Ta'];
    public $timestamps = false;
    public function user(){
        return $this->hasMany('App\Models\User','user_id','id');
    }
    public function DatMonAn(){
        return $this->hasMany('App\Models\DatMonAn','user_id','id');
    }
}
