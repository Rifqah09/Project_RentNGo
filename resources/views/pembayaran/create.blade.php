@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bayar Penyewaan #{{ $penyewaan->id }}</h2>

    <p>Total Pembayaran: <strong>Rp{{ number_format($subtotal) }}</strong></p>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach</ul>
    </div>
    @endif

    <form action="{{ route('pembayaran.store', $penyewaan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" required value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Pembayaran</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Bayar Sekarang</button>
    </form>
</div>
@endsection
