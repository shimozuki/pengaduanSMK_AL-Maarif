@extends('layouts.admin')
@section('title','Detail siswa')
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
    <a href="{{ route('siswa.index') }}" class="text-primary">Data Siswa</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Siswa</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Detail Siswa
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NISN</th>
                                <td>:</td>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>:</td>
                                <td>{{ $siswa->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            <tr>
                                <th>No Telpl</th>
                                <td>:</td>
                                <td>{{ $siswa->telp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection