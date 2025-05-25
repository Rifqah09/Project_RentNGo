@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alat Camping</h1>
    <a href="{{ route('alat_camping.create') }}" class="btn btn-primary mb-3">Tambah Alat Camping</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Alat</th>
                <th>Deskripsi</th>
                <th>Harga Sewa</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alatCampings as $alat)
                <tr>
                    <td>{{ $alat->nama_alat }}</td>
                    <td>{{ $alat->deskripsi }}</td>
                    <td>Rp {{ number_format($alat->harga_sewa, 0, ',', '.') }}</td>
                    <td>{{ $alat->stok }}</td>
                    <td>
                        <a href="{{ route('alat_camping.edit', $alat) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('alat_camping.destroy', $alat) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
