@extends('layouts.app')

@section('content')
<h2>Kelola Pengguna</h2>
<a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-2">Tambah Pengguna</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
