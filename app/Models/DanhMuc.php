<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danh_muc';
    protected $fillable = ['Ten_danhmuc'];
    public $timestamps = false;
    public function monan(){
        return $this->hasMany('App\Models\MonAn','idDanhMuc','id');
    }
}
