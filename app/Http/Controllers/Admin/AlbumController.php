<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Menampilkan daftar semua album.
     */
    public function index()
    {
        $albums = Album::withCount('photos')->latest()->paginate(10);
        return view('admin.album.index', compact('albums'));
    }

    /**
     * Menampilkan formulir untuk membuat album baru.
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Menyimpan album baru dan foto-fotonya.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $album = Album::create($request->only('title', 'description', 'date'));

        foreach ($request->file('photos') as $photoFile) {
            $path = $photoFile->store('albums', 'public');
            $album->photos()->create(['path' => $path]);
        }

        return redirect()->route('admin.album.index')->with('success', 'Album baru berhasil dibuat.');
    }

    /**
     * Menampilkan formulir untuk mengedit album.
     */
    public function edit(Album $album)
    {
        return view('admin.album.edit', compact('album'));
    }

    /**
     * Memperbarui detail album dan menambahkan foto baru jika ada.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $album->update($request->only('title', 'description', 'date'));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('albums', 'public');
                $album->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.album.index')->with('success', 'Album berhasil diperbarui.');
    }

    /**
     * Menghapus album beserta semua filenya dari storage.
     */
    public function destroy(Album $album)
    {
        foreach ($album->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }
        $album->delete();
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil dihapus.');
    }
    
    /**
     * [KODE BARU] Menghapus satu foto dari album.
     */
    public function destroyPhoto(Photo $photo)
    {
        // 1. Hapus file foto dari storage
        Storage::disk('public')->delete($photo->path);

        // 2. Hapus data foto dari database
        $photo->delete();

        // 3. Kembali ke halaman edit album sebelumnya
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}