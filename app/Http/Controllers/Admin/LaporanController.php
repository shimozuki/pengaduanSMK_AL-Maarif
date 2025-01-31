<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.laporan.index');
    }
    public function getlaporan(Request $req)
    {
        $from=$req->from . ' ' . '00:00:00';
        $to=$req->to . ' ' . '23:59:59';
        $pengaduan=Pengaduan::whereBetween('tgl_pengaduan',[$from,$to])->get();
        return view('Admin.laporan.index',['pengaduan'=>$pengaduan,'from'=>$from,'to'=>$to]);
    }
    public function cetaklaporan($from,$to){
        $pengaduan=Pengaduan::whereBetween('tgl_pengaduan',[$from,$to])->get();
        $pdf=PDF::loadView('Admin.laporan.cetak',['pengaduan'=>$pengaduan]);
        return $pdf->download('laporan.pengaduan.pdf');
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
    public function show($laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tanggapan)
    {
        //
    }
}
