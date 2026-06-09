@extends('layout.app')

@section('content')
    <h1>Tambah Karyawan</h1>

    <form action="{{ route('daftar-karyawan.store') }}" method="POST">

        @csrf

        <label>Nama</label>
        <br>
        <input type="text" name="nama_karyawan">
        <br><br>

        <label>NIY</label>
        <br>
        <input type="text" name="niy">
        <br><br>

        <label>Position ID</label>
        <br>
        <input type="number" name="position_id">
        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>
@endsection
