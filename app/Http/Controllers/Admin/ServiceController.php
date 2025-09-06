<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar semua layanan.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.layanan.index', compact('services'));
    }

    /**
     * Menampilkan formulir untuk membuat layanan baru.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Menyimpan layanan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'requirements' => 'required|string',
            'flow' => 'required|string',
            'duration' => 'nullable|string|max:255',
            'cost' => 'nullable|string|max:255',
        ]);

        Service::create($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu layanan (tidak kita gunakan, jadi kita lewati).
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Menampilkan formulir untuk mengedit layanan.
     * Variabel $layanan diganti menjadi $service agar konsisten.
     */
    public function edit(Service $layanan)
    {
        return view('admin.layanan.edit', ['service' => $layanan]);
    }

    /**
     * Memperbarui layanan di database.
     * Variabel $layanan diganti menjadi $service agar konsisten.
     */
    public function update(Request $request, Service $layanan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'requirements' => 'required|string',
            'flow' => 'required|string',
            'duration' => 'nullable|string|max:255',
            'cost' => 'nullable|string|max:255',
        ]);

        $layanan->update($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan dari database.
     * Variabel $layanan diganti menjadi $service agar konsisten.
     */
    public function destroy(Service $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}