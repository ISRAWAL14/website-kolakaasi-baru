<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman galeri admin.
     */
    public function index()
    {
        $allPhotos = Gallery::latest()->paginate(12);
        return view('admin.galeri.index', compact('allPhotos'));
    }

    /**
     * Menyimpan foto baru. (Sudah Diperbarui)
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Buat satu ID unik untuk kelompok upload ini
        $batchId = uniqid();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('gallery-photos', 'public');

                Gallery::create([
                    'caption' => $request->caption,
                    'image_url' => $imagePath,
                    'batch_id' => $batchId, // Simpan ID kelompok yang sama untuk semua foto
                ]);
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Foto-foto berhasil diunggah.');
    }

    /**
     * Menghapus foto.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus file gambar dari storage
        Storage::disk('public')->delete($gallery->image_url);
        
        // Hapus data dari database
        $gallery->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}