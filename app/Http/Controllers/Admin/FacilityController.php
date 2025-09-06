<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    // Menampilkan daftar semua fasilitas
    public function index()
    {
        $allFacilities = Facility::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('allFacilities'));
    }

    // Menampilkan form untuk menambah fasilitas baru
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    // Menyimpan data fasilitas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Facility::create($request->all());

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit fasilitas
    public function edit(Facility $fasilita) // <-- DIUBAH
    {
        return view('admin.fasilitas.edit', ['facility' => $fasilita]); // <-- DIUBAH
    }

    // Memperbarui data fasilitas di database
    public function update(Request $request, Facility $fasilita) // <-- DIUBAH
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $fasilita->update($request->all()); // <-- DIUBAH

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    // Menghapus data fasilitas dari database
    public function destroy(Facility $fasilita) // <-- DIUBAH
    {
        $fasilita->delete(); // <-- DIUBAH
        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil dihapus.');
    }
}