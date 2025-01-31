@extends('layouts.admin')
@section('title','Form Tambah petugas')
@section('css')
    <style>
        .text-primary:hover{
            text-decoration: underline;
        }
        .text-grey{
            color: #6c7576;
        }
        .text-grey:hover{
            color: #6c7576;
        }
        
    </style>
@endsection
@section('header')
    <a href="{{ route('petugas.index') }}" class="text-primary">Data Petugas</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Data Petugas</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Edit Petugas
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.update',$petugas->id_petugas) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $petugas->email }}" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <div class="input-group mt-3">
                                <select name="level" id="level" class="custom-select">
                                    @if ($petugas->level=='admin')
                                        <option selected value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    @else
                                    <option value="admin">Admin</option>
                                    <option selected value="petugas">Petugas</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-warning text-white" type="submit" style="width: 100%;">Update</button>
                    </form>
                    <form action="{{ route('petugas.destroy',$petugas->id_petugas) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2" style="width: 100%;">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection