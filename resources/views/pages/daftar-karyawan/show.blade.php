@extends('layout.app')

@section('content')
    <h1>Detail Karyawan</h1>

    <p>
        <strong>ID :</strong>
        {{ $employee->id }}
    </p>

    <p>
        <strong>Nama :</strong>
        {{ $employee->nama_karyawan }}
    </p>

    <p>
        <strong>NIY :</strong>
        {{ $employee->niy }}
    </p>

    <p>
        <strong>Position ID :</strong>
        {{ $employee->position_id }}
    </p>

    <p>
        <strong>Gaji Pokok :</strong>
        {{ $employee->gaji_pokok }}
    </p>

    <a href="{{ route('daftar-karyawan.index') }}">
        Kembali
    </a>
@endsection
