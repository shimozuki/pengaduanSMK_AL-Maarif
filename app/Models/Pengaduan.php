<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey='id_pengaduan';
    protected $dates =['tgl_pengaduan'];
    public function siswa(){
        return $this->belongsTo(Siswa::class,'nisn');
    }
    public function tanggapan(){
        return $this->hasOne(Tanggapan::class,'id_pengaduan');
    }
}
