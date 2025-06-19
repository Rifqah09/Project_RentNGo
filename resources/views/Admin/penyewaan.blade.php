@extends('layouts.app')

@section('content')
<h2>Kelola Penyewaan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Penyewa</th><th>Tgl Sewa</th><th>Tgl Kembali</th><th>Status</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penyewaans as $sewa)
        <tr>
            <td>{{ $sewa->user->name }}</td>
            <td>{{ $sewa->tanggal_sewa }}</td>
            <td>{{ $sewa->tanggal_kembali }}</td>
            <td>{{ $sewa->status }}</td>
            <td>
                @if($sewa->status == 'pending')
                    <form method="POST" action="{{ route('penyewaan.konfirmasi', $sewa->id) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Konfirmasi</button>
                    </form>
                @elseif($sewa->status == 'confirmed')
                    <form method="POST" action="{{ route('penyewaan.selesai', $sewa->id) }}">
                        @csrf
                        <button class="btn btn-secondary btn-sm">Tandai Selesai</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
