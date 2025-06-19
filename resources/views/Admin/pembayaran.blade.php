@extends('layouts.app')

@section('content')
<h2>Kelola Pembayaran</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Penyewa</th><th>Subtotal</th><th>Status</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayarans as $bayar)
        <tr>
            <td>{{ $bayar->penyewaan->user->name }}</td>
            <td>Rp {{ number_format($bayar->subtotal) }}</td>
            <td>{{ $bayar->status }}</td>
            <td>
                @if($bayar->status == 'pending')
                    <form method="POST" action="{{ route('pembayaran.konfirmasi', $bayar->id) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
