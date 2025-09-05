<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman formulir untuk mengedit profil kelurahan.
     */
    public function edit()
    {
        $profile = Profile::first(); // Ambil data profil yang ada
        return view('admin.profile-edit', compact('profile'));
    }

    /**
     * Menyimpan perubahan data profil ke database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
            'history' => 'required|string',
            'north_boundary' => 'required|string',
            'east_boundary' => 'required|string',
            'south_boundary' => 'required|string',
            'west_boundary' => 'required|string',
        ]);

        // Cari data profil yang ada, atau buat baru jika belum ada
        $profile = Profile::firstOrCreate([]);

        // Update data di database
        $profile->update($request->all());

        // Kembali ke halaman edit dengan pesan sukses
        return redirect()->route('admin.profile.edit')->with('success', 'Profil kelurahan berhasil diperbarui!');
    }
}