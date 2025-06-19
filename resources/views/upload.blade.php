@extends('layouts.app')

@section('content')
<h2>Upload Bukti Pembayaran</h2>
<form action="{{ route('pembayaran.upload', $penyewaan_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="bukti">Upload Bukti (gambar/pdf):</label>
        <input type="file" name="bukti" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Metode Pembayaran</label>
        <select name="metode_pembayaran" class="form-control" required>
            <option value="transfer">Transfer</option>
            <option value="cash">Cash</option>
        </select>
    </div>
    <button class="btn btn-success">Upload</button>
</form>
@endsection
