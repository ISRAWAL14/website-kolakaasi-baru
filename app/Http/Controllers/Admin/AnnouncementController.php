<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Menampilkan daftar semua pengumuman
    public function index()
    {
        $allAnnouncements = Announcement::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('allAnnouncements'));
    }

    // Menampilkan form untuk menambah pengumuman baru
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    // Menyimpan data pengumuman baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create($request->all());

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pengumuman
    public function edit(Announcement $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    // Memperbarui data pengumuman di database
    public function update(Request $request, Announcement $pengumuman)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    // Menghapus data pengumuman dari database
    public function destroy(Announcement $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}