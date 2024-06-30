<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    protected $table = 'loai_phong';
    protected $fillable = ['MoTa'];
    public $timestamps = false;
    public function phong(){
        return $this->hasMany('App\Models\Phong','id_loaiphong','id');
    }
}
