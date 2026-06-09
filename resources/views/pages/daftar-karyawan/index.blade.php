@extends('layout.app')

@section('content')
    <h1>Daftar Karyawan</h1>

    <a href="{{ route('daftar-karyawan.create') }}">
        Tambah Karyawan
    </a>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIY</th>
            <th>Aksi</th>
        </tr>

        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->nama_karyawan }}</td>
                <td>{{ $employee->niy }}</td>

                <td>
                    <a href="{{ route('daftar-karyawan.show', $employee->id) }}">
                        Detail
                    </a>

                    <a href="{{ route('daftar-karyawan.edit', $employee->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('daftar-karyawan.destroy', $employee->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
