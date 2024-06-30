<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'lich_lam';
    protected $fillable = ['title','start','end','created_at','updated_at','user_id'];
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}
