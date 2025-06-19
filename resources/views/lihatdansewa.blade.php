@extends('layouts.dashsewa')

@section('content')
<style>
    .card h5 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .card p {
        font-size: 14px;
        margin-bottom: 4px;
    }

    .btn-sm {
        font-size: 13px;
        padding: 6px 12px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }
</style>

<h2>Daftar Alat Camping</h2>
@if (session('sukses'))
    <h3>{{session('sukses')}}</h3>
    @elseif (session('gagal'))
    <h3>{{session('gagal')}}</h3>
@endif
<div class="row">
    @foreach($alat as $item)
    <div class="col-md-4">
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5>{{ $item->nama_alat }}</h5>
                <p>{{ $item->deskripsi }}</p>
                <p>Harga Sewa: <strong>Rp {{ number_format($item->harga_sewa) }}</strong></p>
                <form action="{{ route('sewa.alat', $item->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">Sewa</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
