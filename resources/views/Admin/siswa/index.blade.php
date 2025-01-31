@extends('layouts.admin')
@section('title','Halaman Siswa')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection
@section('header','Data Siswa')
@section('content')
    <table id="siswaTable" class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Email</th>
                <th>No telp</th>
                <th>Detail</th>
            </tr>
        </thead>
        @foreach ($siswa as $k=>$v)
            <tbody>
                <tr>
                    <td>{{ $k+=1 }}</td>
                    <td>{{ $v->nisn }}</td>
                    <td>{{ $v->nama }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->telp }}</td>
                    <td>
                        <a href="{{ route('siswa.show',$v->nisn) }}" style="text-decoration:underline;">Lihat</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#siswaTable').DataTable();
        });
    </script>
@endsection
