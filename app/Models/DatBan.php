<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatBan extends Model
{
    protected $table = 'dat_ban';
    protected $fillable = ['HoTen','email','SDT','Ngay','Gio','So_nguoi','id_phong'];
    public $timestamps = false;
    public function Phong(){
        return $this->belongsTo('App\Models\Phong','id','id_phong');
    }
}
