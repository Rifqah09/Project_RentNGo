@extends('layouts.app')

@section('content')
<style>
    h2 {
        font-size: 26px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
    }

    .table th, .table td {
        vertical-align: middle;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    .badge-status {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .badge-pending {
        background-color: #ffc107;
        color: #000;
    }

    .badge-dikonfirmasi {
        background-color: #198754;
        color: #fff;
    }

    .badge-dibatalkan {
        background-color: #dc3545;
        color: #fff;
    }

    .text-muted {
        text-align: center;
        font-style: italic;
        font-size: 14px;
    }
</style>

<div class="container py-4">
    <h2>📋 Riwayat Penyewaan Alat Camping</h2>

    @if($riwayats->isEmpty())
        <p class="text-muted">Belum ada riwayat penyewaan.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered shadow-sm rounded-3">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Tanggal Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $index => $riwayat)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            @foreach ($riwayat->penyewaan->alatCampings as $alat)
                                {{ $alat->nama_alat }}<br>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @foreach ($riwayat->penyewaan->alatCampings as $alat)
                                {{ $alat->pivot->jumlah }}<br>
                            @endforeach
                        </td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($riwayat->penyewaan->tanggal_sewa)->format('d M Y') }}</td>
                        <td class="text-center">
                            @php
                                $status = strtolower($riwayat->penyewaan->status);
                                $badgeClass = match($status) {
                                    'pending' => 'badge-pending',
                                    'dikonfirmasi' => 'badge-dikonfirmasi',
                                    'dibatalkan' => 'badge-dibatalkan',
                                    default => 'badge-secondary'
                                };
                            @endphp
                            <span class="badge badge-status {{ $badgeClass }}">
                                {{ ucfirst($riwayat->penyewaan->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
