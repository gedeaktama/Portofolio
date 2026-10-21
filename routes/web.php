<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Portofolio Gede Erik Aktama, S.Pd., M.Pd.
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profile'])->name('profile');
Route::get('/publikasi', [PageController::class, 'publications'])->name('publications');
Route::get('/publikasi/{slug}', [PageController::class, 'publicationDetail'])->name('publications.detail');
Route::get('/riset-dan-pkm', [PageController::class, 'researchAndCommunity'])->name('research.community');
Route::get('/proyek', [PageController::class, 'projects'])->name('projects');
Route::get('/proyek/{slug}', [PageController::class, 'projectDetail'])->name('projects.detail');
Route::get('/akademik', [PageController::class, 'academic'])->name('academic');
Route::get('/pelatihan', [PageController::class, 'trainings'])->name('trainings');
Route::get('/ventures', [PageController::class, 'ventures'])->name('ventures');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots'])->name('robots');
