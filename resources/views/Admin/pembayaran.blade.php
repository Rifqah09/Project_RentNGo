@extends('layouts.app')

@section('content')
<style>
    h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 26px;
        margin-bottom: 25px;
        text-align: center;
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-pending {
        background-color: #ffeeba;
        color: #856404;
    }

    .status-completed {
        background-color: #c3e6cb;
        color: #155724;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .btn-sm {
        font-size: 13px;
        padding: 5px 12px;
    }
</style>

<h2>💰 Kelola Pembayaran</h2>

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>👤 Nama Penyewa</th>
                    <th>💵 Subtotal</th>
                    <th>📌 Status</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembayarans as $bayar)
                    <tr>
                        <td>{{ $bayar->penyewaan->user->name }}</td>
                        <td>Rp {{ number_format($bayar->subtotal) }}</td>
                        <td>
                            <span class="status-badge 
                                {{ $bayar->status == 'completed' ? 'status-completed' : 'status-pending' }}">
                                {{ ucfirst($bayar->status) }}
                            </span>
                        </td>
                        <td>
                            @if($bayar->status == 'pending')
                            <form method="POST" action="{{ route('pembayaran.konfirmasi', $bayar->id) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    <i class="fas fa-check-circle me-1"></i> Konfirmasi
                                </button>
                            </form>
                            @else
                            <span class="text-success"><i class="fas fa-check-circle"></i> Terkonfirmasi</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
