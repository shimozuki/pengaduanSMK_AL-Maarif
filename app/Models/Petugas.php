<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class Petugas extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey='id_petugas';
    public function tanggapan(){
        return $this->hasOne(Tanggapan::class,'id_petugas');
    }
}
