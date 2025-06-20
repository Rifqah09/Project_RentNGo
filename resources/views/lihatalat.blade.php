@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0" style="font-family: 'Poppins', sans-serif;">
            🏕️ Daftar Alat Camping
        </h4>
        <a href="{{ route('tambahalat') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Tambah Alat
        </a>
    </div>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Alat</th>
                            <th>Harga Sewa</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alat as $ac)
                            <tr>
                                <td>
                                    @if($ac->gambar_url)
                                        <img src="{{ $ac->gambar_url }}"
                                             onerror="this.onerror=null; this.src='{{ asset('images/default.png') }}';"
                                             alt="Gambar {{ $ac->nama_alat }}"
                                             class="card-img-top w-100"
                                             style="max-height:180px; object-fit:cover;">
                                    @endif
                                </td>
                                <td>{{ $ac->nama_alat }}</td>
                                <td>Rp {{ number_format($ac->harga_sewa, 0, ',', '.') }}</td>
                                <td>{{ $ac->deskripsi }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('editalat', $ac->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('deletealat', $ac->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada alat camping yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
