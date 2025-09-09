<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

// Import semua controller admin
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\PerangkatController as AdminPerangkatController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

/*
|--------------------------------------------------------------------------
| Rute Halaman Publik
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profilePage'])->name('profile.page');
Route::get('/perangkat', [PerangkatController::class, 'index'])->name('perangkat.page');
Route::get('/fasilitas', [FacilityController::class, 'index'])->name('fasilitas.page');
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('pengumuman.page');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.page');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.page');
Route::get('/galeri/{album}', [GalleryController::class, 'show'])->name('galeri.show');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.page');
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.page');

/*
|--------------------------------------------------------------------------
| Rute Admin & Dashboard
|--------------------------------------------------------------------------
*/

// Rute untuk dasbor pengguna biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute bawaan Breeze untuk profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-user', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-user', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute redirect untuk /admin
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.index');

// === [GRUP ADMIN] ===
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Profil Kelurahan
    Route::get('/kelola-profil', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/kelola-profil', [AdminProfileController::class, 'update'])->name('profile.update');

    // Kontak
    Route::get('/kontak', [AdminContactController::class, 'edit'])->name('kontak.edit');
    Route::patch('/kontak', [AdminContactController::class, 'update'])->name('kontak.update');

    // Rute Resource
    Route::resource('/perangkat', AdminPerangkatController::class)->names('perangkat');
    Route::resource('/fasilitas', AdminFacilityController::class)->names('fasilitas');
    Route::resource('/pengumuman', AdminAnnouncementController::class)->names('pengumuman');
    Route::resource('/agenda', AdminAgendaController::class)->names('agenda');
    Route::resource('/layanan', AdminServiceController::class)->names('layanan');
    Route::resource('/album', AdminAlbumController::class)->names('album');

    // [KODE BARU] Rute untuk menghapus satu foto
    Route::delete('/photo/{photo}', [AdminAlbumController::class, 'destroyPhoto'])->name('photo.destroy');
});

require __DIR__.'/auth.php';
