@extends('layout.app')

@section('content')
    <h1>Edit Karyawan</h1>

    <form action="{{ route('daftar-karyawan.update', $employee->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nama</label>
        <br>
        <input type="text" name="nama_karyawan" value="{{ $employee->nama_karyawan }}">
        <br><br>

        <label>NIY</label>
        <br>
        <input type="text" name="niy" value="{{ $employee->niy }}">
        <br><br>

        <label>Position ID</label>
        <br>
        <input type="number" name="position_id" value="{{ $employee->position_id }}">
        <br><br>

        <label>Gaji Pokok</label>
        <br>
        <input type="number" name="gaji_pokok" value="{{ $employee->gaji_pokok }}">
        <br><br>

        <button type="submit">
            Update
        </button>

    </form>
@endsection
