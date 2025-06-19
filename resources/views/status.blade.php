@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center" style="font-family: 'Poppins', sans-serif; font-size: 2rem;">
    💳 Status Pembayaran
</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($pembayaran->isEmpty())
        <div class="alert alert-info text-center">Belum ada data pembayaran.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-success text-center">
                <tr>
                    <th>Subtotal</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $bayar)
                <tr class="text-center align-middle">
                    <td>Rp {{ number_format($bayar->subtotal, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($bayar->metode_pembayaran) }}</td>
                    <td>
                        @if($bayar->status == 'completed')
                            <span class="badge bg-success">Selesai</span>
                        @elseif($bayar->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @else
                            <span class="badge bg-secondary">Tidak Diketahui</span>
                        @endif
                    </td>
                    <td>{{ $bayar->payment_date ? date('d-m-Y H:i', strtotime($bayar->payment_date)) : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
