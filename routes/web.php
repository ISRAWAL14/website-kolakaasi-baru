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
use App\Http\Controllers\ServiceController; // <-- TAMBAHKAN INI

// Import semua controller admin
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\PerangkatController as AdminPerangkatController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
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
Route::get('/galeri/foto/{photo}', [GalleryController::class, 'show'])->name('galeri.show');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.page');
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.page'); // <-- TAMBAHKAN INI

/*
|--------------------------------------------------------------------------
| Rute Admin & Dashboard
|--------------------------------------------------------------------------
*/

// Rute untuk dasbor pengguna biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute bawaan Breeze untuk profil pengguna (ganti password, dll)
Route::middleware('auth')->group(function () {
    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-user', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-user', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// === Rute redirect untuk /admin agar tidak 404 ===
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.index');

// === [GRUP ADMIN] Semua rute admin dikelompokkan di sini ===
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute Dasbor Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Rute untuk mengelola profil kelurahan
    Route::get('/kelola-profil', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/kelola-profil', [AdminProfileController::class, 'update'])->name('profile.update');

    // Rute Resource lainnya
    Route::resource('/perangkat', AdminPerangkatController::class)->names('perangkat');
    Route::resource('/fasilitas', AdminFacilityController::class)->names('fasilitas');
    Route::resource('/pengumuman', AdminAnnouncementController::class)->names('pengumuman');
    Route::resource('/agenda', AdminAgendaController::class)->names('agenda');
    Route::resource('/layanan', AdminServiceController::class)->names('layanan');

    // Rute untuk mengelola Galeri
    Route::get('/galeri', [AdminGalleryController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [AdminGalleryController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{gallery}', [AdminGalleryController::class, 'destroy'])->name('galeri.destroy');
    
    // Rute untuk mengelola Kontak
    Route::get('/kontak', [AdminContactController::class, 'edit'])->name('kontak.edit');
    Route::patch('/kontak', [AdminContactController::class, 'update'])->name('kontak.update');
});

require __DIR__.'/auth.php';