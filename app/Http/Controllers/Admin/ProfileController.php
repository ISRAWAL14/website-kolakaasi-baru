<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil.
     */
    public function edit()
    {
        // Mengambil data profil pertama, atau membuat yang baru jika belum ada
        $profile = Profile::firstOrCreate([]);
        return view('admin.profile-edit', compact('profile'));
    }

    /**
     * Memperbarui data profil di database.
     */
    public function update(Request $request)
    {
        // Mengambil data profil pertama yang ada
        $profile = Profile::first();

        // Validasi semua input dari form, termasuk yang baru
        $validated = $request->validate([
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'north_boundary' => 'required|string|max:255',
            'east_boundary' => 'required|string|max:255',
            'south_boundary' => 'required|string|max:255',
            'west_boundary' => 'required|string|max:255',
            'population_total' => 'required|integer',
            'household_count' => 'required|integer',
            'population_male' => 'required|integer',
            'population_female' => 'required|integer',
            
            // Validasi untuk data baru
            'luas_wilayah' => 'nullable|string|max:255',
            'jumlah_rt' => 'nullable|integer',
            'jumlah_rw' => 'nullable|integer',
            'penduduk_anak' => 'nullable|integer',
            'penduduk_remaja' => 'nullable|integer',
            'penduduk_dewasa' => 'nullable|integer',
            'penduduk_lansia' => 'nullable|integer',
            'pencaharian_pns' => 'nullable|integer',
            'pencaharian_wiraswasta' => 'nullable|integer',
            'pencaharian_petani' => 'nullable|integer',
            'pencaharian_lainnya' => 'nullable|integer',
        ]);

        // Update data profil dengan data yang sudah divalidasi
        $profile->update($validated);

        // Redirect kembali ke halaman edit dengan pesan sukses
        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
