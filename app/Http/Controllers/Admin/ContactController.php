<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // ... fungsi edit() biarkan saja ...
    public function edit()
    {
        $contact = Contact::first();
        return view('admin.kontak.edit', compact('contact'));
    }

    // Menyimpan perubahan data kontak ke database
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'google_maps_link' => 'required|string', // Aturan 'url' dihapus, diubah menjadi 'string'
        ]);

        // Cari data kontak yang ada, atau buat baru jika belum ada
        $contact = Contact::firstOrCreate([]);

        // Update data di database
        $contact->update($request->all());

        // Kembali ke halaman edit dengan pesan sukses
        return redirect()->route('admin.kontak.edit')->with('success', 'Data kontak berhasil diperbarui!');
    }
}