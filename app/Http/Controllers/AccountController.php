<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('akun', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi name & email untuk semua role
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Hanya jika admin, izinkan update password
        if ($user->role === 'admin') {
            $request->validate([
                'password' => 'nullable|confirmed|min:6',
            ]);

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
        }

        $user->save();

        return back()->with('success', 'Akun berhasil diperbarui.');
    }
}
