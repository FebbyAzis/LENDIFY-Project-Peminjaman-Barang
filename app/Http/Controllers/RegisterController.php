<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register_admin');
    }

    public function register_admin(Request $request)
    {
        $request->validate([
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'no_tlp' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required', // Harus ada field password_confirmation
        ]);

        // Simpan user ke database
        User::create([
            'nama_depan' => $request['nama_depan'],
            'nama_belakang' => $request['nama_belakang'],
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return view('auth.register_success');
    }

    public function register_success()
    {
        return view('auth.register_success');
    }
}
