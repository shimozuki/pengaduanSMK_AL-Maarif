<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan=Pengaduan::orderby('tgl_pengaduan','desc')->get();
        return view('admin.pengaduan.index',['pengaduan'=>$pengaduan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pengaduan)
    {
        $pengaduan=Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
        $tanggapan=Tanggapan::where('id_pengaduan',$id_pengaduan)->first();
        return view('admin.pengaduan.show',['pengaduan'=>$pengaduan,'tanggapan'=>$tanggapan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
