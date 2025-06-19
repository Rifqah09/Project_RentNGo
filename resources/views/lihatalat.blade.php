@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Ini Tabel</h5>
            <a href="{{ route('tambahalat') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus-circle me-1"></i> Tambah Alat Camping
            </a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>

                                    <th>Nama Alat Camping</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alat as $ac)
                                    <tr>
                                        <td>{{ $ac->nama_alat }}</td>
                                        <td>{{ $ac->harga_sewa }}</td>
                                        <td>{{ $ac->deskripsi }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('editalat', $ac->id) }}"
                                                    class="btn btn-success btn-sm btn-icon-text me-3">
                                                    <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                                                </a>
                                                <form action="{{ route('deletealat', $ac->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="typcn typcn-trash btn-icon-prepend"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
