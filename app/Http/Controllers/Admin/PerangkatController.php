<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatKelurahan;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    // Menampilkan daftar semua perangkat
    public function index()
    {
        $allPerangkat = PerangkatKelurahan::latest()->paginate(10);
        return view('admin.perangkat.index', compact('allPerangkat'));
    }

    // Menampilkan form untuk menambah perangkat baru
    public function create()
    {
        return view('admin.perangkat.create');
    }

    // Menyimpan data perangkat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo_url' => 'nullable|url',
        ]);

        PerangkatKelurahan::create($request->all());

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit perangkat
    public function edit(PerangkatKelurahan $perangkat)
    {
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    // Memperbarui data perangkat di database
    public function update(Request $request, PerangkatKelurahan $perangkat)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo_url' => 'nullable|url',
        ]);

        $perangkat->update($request->all());

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    // Menghapus data perangkat dari database
    public function destroy(PerangkatKelurahan $perangkat)
    {
        $perangkat->delete();
        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil dihapus.');
    }
}