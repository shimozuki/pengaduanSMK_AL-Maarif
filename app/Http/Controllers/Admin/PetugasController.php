<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas=Petugas::all();
        return view('admin.petugas.index',['petugas'=>$petugas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $validate=Validator::make($data,[
            'nama_petugas'=>['required','string','max:255'],
            'email'=>['required','string','unique:petugas'],
            'password'=>['required','string','min:5'],
            'telp'=>['required'],
            'level'=>['required','in:admin,petugas'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        $email=Petugas::where('email',$data['email'])->first();
        if($email){
            return redirect()->back()->with(['email'=>'Email sudah di gunakan!']);
        }
        Petugas::create([
            'nama_petugas'=>$data['nama_petugas'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'telp'=>$data['telp'],
            'level'=>$data['level'],
        ]);
        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_petugas)
    {
        $petugas=Petugas::where('id_petugas',$id_petugas)->first();
        return view('admin.petugas.edit',['petugas'=>$petugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_petugas)
    {
        $data=$request->all();
        $petugas=Petugas::find($id_petugas);
        $petugas->update([
            'nama_petugas'=>$data['nama_petugas'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'telp'=>$data['telp'],
            'level'=>$data['level'],
        ]);
        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_petugas)
    {
        $petugas=Petugas::findOrfail($id_petugas);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}
