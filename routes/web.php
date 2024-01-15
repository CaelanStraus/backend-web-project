<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('homepage');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/searchProfiles', function () {
    return view('searchProfiles');
})->name('searchProfiles');

Route::get('/adminPanel', function () {
    return view('adminPanel');
})->name('adminPanel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/update-dob', [ProfileController::class, 'updateDOB'])->name('profile.update.dob');
    Route::patch('/profile/update-bio', [ProfileController::class, 'updateBio'])->name('profile.update.bio');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/user/{id}', [ProfileController::class, 'destroyUser'])->name('user.destroy');
    Route::post('/user/{id}/promote', [ProfileController::class, 'promoteUser'])->name('user.promote');
    Route::post('/user/{id}/demote', [ProfileController::class, 'demoteUser'])->name('user.demote');
    Route::get('/profile/{id}/show', [ProfileController::class, 'showUserProfile'])->name('profile.showUserProfile');
});

require __DIR__.'/auth.php';
