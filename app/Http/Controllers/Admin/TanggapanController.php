<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function CreateOrUpdate(Request $req){
        $pengaduan=Pengaduan::where('id_pengaduan',$req->id_pengaduan)->first();
        $tanggapan=Tanggapan::where('id_pengaduan',$req->id_pengaduan)->first();
        if($tanggapan){
            $pengaduan->update(['status'=>$req->status]);
            $tanggapan->update([
                'tgl_tanggapan' =>date('Y-m-d'),
                'tanggapan' =>$req->tanggapan,
                'id_petugas' =>Auth::guard('admin')->user()->id_petugas,
            ]);
            return redirect()->route('pengaduan.show',['pengaduan'=>$pengaduan,'tanggapan'=>$tanggapan])->with(['status'=>'Data berhasil dikirim!']);
        }else{
            $pengaduan->update(['status'=>$req->status]);
            $tanggapan=Tanggapan::create([
                'id_pengaduan'=>$req->id_pengaduan,
                'tgl_tanggapan' =>date('Y-m-d'),
                'tanggapan' =>$req->tanggapan,
                'id_petugas' =>Auth::guard('admin')->user()->id_petugas,
            ]);
            return redirect()->route('pengaduan.show',['pengaduan'=>$pengaduan,'tanggapan'=>$tanggapan])->with(['status'=>'Data berhasil dikirim!']);
        }
    }
}
