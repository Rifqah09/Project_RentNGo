@extends('layouts.app')

@section('content')
<style>
    h2 {
        font-size: 26px;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 30px;
        font-weight: 600;
        text-align: center;
    }

    .card-alat {
        transition: 0.3s;
    }

    .card-alat:hover {
        transform: scale(1.02);
    }

    .card-img-top {
        max-height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .card h5 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 14px;
        color: #555;
    }
</style>

<div class="container">
    <h2>📦 Daftar Alat Camping</h2>

    @if (session('sukses'))
        <div class="alert alert-success text-center">{{ session('sukses') }}</div>
    @elseif (session('gagal'))
        <div class="alert alert-danger text-center">{{ session('gagal') }}</div>
    @endif

    <form action="{{ route('sewa.alat') }}" method="POST">
        @csrf
        <div class="row">
            @forelse($alat as $item)
            <div class="col-md-4 mb-4">
                <div class="card card-alat shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        
                        @if($item->gambar_url)
    <img src="{{ $item->gambar_url }}"
         onerror="this.onerror=null; this.src='{{ asset('images/default.png') }}';"
         alt="Gambar {{ $item->nama_alat }}"
         class="card-img-top w-100"
         style="max-height:180px; object-fit:cover;">
@endif
                        {{-- Checkbox Pilihan --}}
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="alat_id[]" value="{{ $item->id }}" id="alat{{ $item->id }}">
                            <label class="form-check-label" for="alat{{ $item->id }}">
                                Pilih Alat
                            </label>
                        </div>

                        {{-- Info Alat --}}
                        <h5>{{ $item->nama_alat }}</h5>
                        <p>{{ $item->deskripsi }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($item->harga_sewa) }}</p>

                        <label for="jumlah{{ $item->id }}" class="form-label">Jumlah:</label>
                        <input type="number" name="jumlah[]" id="jumlah{{ $item->id }}" value="1" min="1" class="form-control">
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada alat camping tersedia.</div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-shopping-cart me-1"></i> Sewa Semua yang Dipilih
            </button>
        </div>
    </form>
</div>
@endsection
