@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="col-md-8 mx-auto">
            <div class="card shadow rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0" style="font-family: 'Poppins', sans-serif;">
                        ✏️ Edit Alat Camping
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatealat', $alat->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_alat" class="form-label">Nama Alat</label>
                            <input type="text" id="nama_alat" name="nama_alat"
                                value="{{ old('nama_alat', $alat->nama_alat) }}"
                                class="form-control @error('nama_alat') is-invalid @enderror" required>
                            @error('nama_alat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input type="number" id="harga_sewa" name="harga_sewa"
                                value="{{ old('harga_sewa', $alat->harga_sewa) }}"
                                class="form-control @error('harga_sewa') is-invalid @enderror" required>
                            @error('harga_sewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror"
                                required>{{ old('deskripsi', $alat->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('lihatalat') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
