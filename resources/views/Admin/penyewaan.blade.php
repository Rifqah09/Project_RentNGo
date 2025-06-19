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

    .badge {
        font-size: 13px;
        padding: 6px 10px;
        border-radius: 12px;
    }

    .badge-pending {
        background-color: #ffeeba;
        color: #856404;
    }

    .badge-confirmed {
        background-color: #cce5ff;
        color: #004085;
    }

    .badge-completed {
        background-color: #d4edda;
        color: #155724;
    }

    .btn-sm {
        font-size: 13px;
        padding: 6px 12px;
    }
</style>

<h2>📋 Kelola Penyewaan</h2>

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>👤 Nama Penyewa</th>
                    <th>📅 Tgl Sewa</th>
                    <th>📆 Tgl Kembali</th>
                    <th>📌 Status</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penyewaans as $sewa)
                <tr>
                    <td>{{ $sewa->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($sewa->tanggal_sewa)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($sewa->tanggal_kembali)->format('d M Y') }}</td>
                    <td>
                        <span class="badge 
                            {{ $sewa->status === 'pending' ? 'badge-pending' : 
                               ($sewa->status === 'confirmed' ? 'badge-confirmed' : 'badge-completed') }}">
                            {{ ucfirst($sewa->status) }}
                        </span>
                    </td>
                    <td>
                        @if($sewa->status === 'pending')
                            <form method="POST" action="{{ route('penyewaan.konfirmasi', $sewa->id) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    <i class="fas fa-check-circle me-1"></i> Konfirmasi
                                </button>
                            </form>
                        @elseif($sewa->status === 'confirmed')
                            <form method="POST" action="{{ route('penyewaan.selesai', $sewa->id) }}">
                                @csrf
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fas fa-flag-checkered me-1"></i> Tandai Selesai
                                </button>
                            </form>
                        @else
                            <span class="text-success"><i class="fas fa-check-circle"></i> Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data penyewaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
