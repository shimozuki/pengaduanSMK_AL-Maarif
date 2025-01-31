<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Pengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $petugas=Petugas::all()->count();
        $siswa=Siswa::all()->count();
        $proses=Pengaduan::where('status','proses')->get()->count();
        $selesai=Pengaduan::where('status','selesai')->get()->count();
        return view('Admin.dashboard',['petugas'=>$petugas,'siswa'=>$siswa,'proses'=>$proses,'selesai'=>$selesai]);
    }
}
