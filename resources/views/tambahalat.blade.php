@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Tambah Alat Camping</h5>


        </div>

        <div class="row">


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    

                        <form class="forms-sample" action="{{ route('simpanalat') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="code">Nama Alat</label>
                                <input type="text" class="form-control" id="code" placeholder="nama_alat"
                                    name="nama_alat">
                            </div>
                            <div class="form-group">
                                <label for="code">Harga</label>
                                <input type="text" class="form-control" id="code" placeholder="harga_sewa"
                                    name="harga_sewa">
                            </div>
                            <div class="form-group">
                                <label for="code">Deskripsi</label>
                                <input type="text" class="form-control" id="code" placeholder="deskripsi"
                                    name="deskripsi">
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    @endsection
