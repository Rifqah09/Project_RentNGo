@foreach ($penyewaans as $penyewaan)
    <p>{{ $penyewaan->tanggal_sewa }} - {{ $penyewaan->alat->nama }}</p>
@endforeach
