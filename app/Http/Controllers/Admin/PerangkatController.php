<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatKelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    public function index()
    {
        $allPerangkat = PerangkatKelurahan::latest()->paginate(10);
        return view('admin.perangkat.index', compact('allPerangkat'));
    }

    public function create()
    {
        return view('admin.perangkat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'tupoksi' => 'nullable|string', // Validasi baru
            'masa_jabatan' => 'nullable|string|max:255', // Validasi baru
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Menyimpan data baru
        $data = $request->only(['name', 'position', 'tupoksi', 'masa_jabatan']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('perangkat-fotos', 'public');
            $data['foto'] = $path;
        }

        PerangkatKelurahan::create($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    public function edit(PerangkatKelurahan $perangkat)
    {
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    public function update(Request $request, PerangkatKelurahan $perangkat)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'tupoksi' => 'nullable|string', // Validasi baru
            'masa_jabatan' => 'nullable|string|max:255', // Validasi baru
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Menyimpan data baru
        $data = $request->only(['name', 'position', 'tupoksi', 'masa_jabatan']);

        if ($request->hasFile('foto')) {
            if ($perangkat->foto) {
                Storage::disk('public')->delete($perangkat->foto);
            }
            $path = $request->file('foto')->store('perangkat-fotos', 'public');
            $data['foto'] = $path;
        }

        $perangkat->update($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    public function destroy(PerangkatKelurahan $perangkat)
    {
        if ($perangkat->foto) {
            Storage::disk('public')->delete($perangkat->foto);
        }
        $perangkat->delete();
        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil dihapus.');
    }
}