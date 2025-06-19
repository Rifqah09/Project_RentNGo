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

    .btn-sm {
        font-size: 13px;
        padding: 6px 12px;
    }

    .badge {
        font-size: 13px;
        padding: 6px 10px;
        border-radius: 12px;
    }

    .text-muted {
        font-style: italic;
        font-size: 13px;
    }

    .gap-2 > * {
        margin-right: 6px;
    }
</style>

<div class="container">
    <h2>👥 Kelola Pengguna</h2>

    <div class="mb-3 text-end">
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pengguna
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $user->role === 'admin' ? 'danger' : 
                                    ($user->role === 'staff' ? 'warning text-dark' : 'success') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                @if ($user->role === 'user')
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-muted">Tidak bisa diubah</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
