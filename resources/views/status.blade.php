@extends('layouts.app')

@section('content')
<h2>Status Pembayaran</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Subtotal</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayaran as $bayar)
        <tr>
            <td>Rp {{ number_format($bayar->subtotal) }}</td>
            <td>{{ $bayar->metode_pembayaran }}</td>
            <td>{{ $bayar->status }}</td>
            <td>{{ $bayar->payment_date ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
