@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">🧾 Upload Bukti Pembayaran</h2>

    <form action="{{ route('pembayaran.upload', $penyewaan_id) }}" method="POST" enctype="multipart/form-data" class="border p-4 shadow-sm rounded bg-light">
        @csrf

        <div class="mb-3">
            <label for="bukti" class="form-label">Upload Bukti Pembayaran (gambar/pdf)</label>
            <input type="file" name="bukti" class="form-control" accept="image/*,application/pdf" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer">Transfer</option>
                <option value="cash">Cash</option>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Upload Pembayaran</button>
        </div>
    </form>
</div>
@endsection
