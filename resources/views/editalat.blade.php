@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Edit</h5>


        </div>

        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <form class="forms-sample" action="{{ route('updatealat', $alat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="code">Nama Alat</label>
                                <input type="text" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}"
                                    class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="code">Harga</label>
                                <input type="text" name="harga_sewa" value="{{ old('harga_sewa', $alat->harga_sewa) }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="code">Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ old('deskripsi', $alat->deskripsi) }}"
                                    class="form-control">
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    @endsection
