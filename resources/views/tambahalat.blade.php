@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-4 text-center" style="font-family: 'Poppins', sans-serif;">
                    🏕️ Tambah Alat Camping
                </h3>

                <div class="card shadow-sm rounded-4">
                    <div class="card-body">
                        <form action="{{ route('simpanalat') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_alat" class="form-label">Nama Alat</label>
                                <input type="text" class="form-control" id="nama_alat" name="nama_alat"
                                    placeholder="Contoh: Tenda Dome" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_sewa" class="form-label">Harga Sewa (per hari)</label>
                                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa"
                                    placeholder="Contoh: 50000" required>
                            </div>

                            {{-- ⬇️ Tambah URL Gambar dan Preview --}}
                            <div class="mb-3">
                                <label for="gambar_url" class="form-label">URL Gambar</label>
                                <input type="url" class="form-control" id="gambar_url" name="gambar_url"
                                    placeholder="https://contoh.com/tenda.jpg">
                            </div>

                            <div class="mb-3">
                                <img id="preview" src="" alt="Preview Gambar"
                                    class="img-fluid rounded shadow-sm d-none" style="max-height: 200px;">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Alat</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                    placeholder="Contoh: Kapasitas 4 orang, tahan hujan, tersedia alas" required></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success me-2">💾 Simpan</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">❌ Batal</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Script preview gambar --}}
    <script>
        document.getElementById('gambar_url').addEventListener('input', function() {
            const url = this.value;
            const img = document.getElementById('preview');
            if (url) {
                img.src = url;
                img.classList.remove('d-none');
            } else {
                img.classList.add('d-none');
            }
        });
    </script>
@endsection
