@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Penyewaan Baru</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach</ul>
    </div>
    @endif

    <form action="{{ route('penyewaan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
            <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required value="{{ old('tanggal_sewa') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required value="{{ old('tanggal_kembali') }}">
        </div>

        <h4>Pilih Alat Camping</h4>
        @foreach($alatCampings as $alat)
        <div class="mb-2">
            <input type="checkbox" id="alat_{{ $alat->id }}" name="alat_camping[]" value="{{ $alat->id }}">
            <label for="alat_{{ $alat->id }}">{{ $alat->nama_alat }} (Stok: {{ $alat->stok }}) - Rp{{ number_format($alat->harga_sewa) }} / hari</label>
            <input type="number" name="jumlah[]" min="1" max="{{ $alat->stok }}" placeholder="Jumlah" class="form-control mt-1" style="width: 100px;">
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Buat Penyewaan</button>
    </form>
</div>
@endsection
