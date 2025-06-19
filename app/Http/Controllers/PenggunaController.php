<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Tampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('Admin.pengguna', compact('users'));
    }

    // Form tambah pengguna
    public function create()
    {
        return view('pengguna.create');
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pengguna.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'role' => 'required|in:admin,staff,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6']);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id)
{
    $user = User::findOrFail($id);

    if ($user->role !== 'user') {
        return redirect()->route('pengguna.index')->with('error', 'Hanya pengguna biasa (user) yang dapat dihapus.');
    }

    $user->delete();
    return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
}
}
