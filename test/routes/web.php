<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\RecuController;
use App\Http\Controllers\ApprovisionementController;




Route::get('/', function () {
    return view('welcome');
});


Route::resource('approvisionnements', ApprovisionementController::class);

Route::resource('users', UserController::class);

Route::resource('clients', ClientController::class);

Route::resource('produits', ProduitController::class);

Route::resource('ligne_commandes', ClientController::class);

Route::resource('commandes', CommandeController::class);

Route::resource('depenses', DepenseController::class);

Route::get('/produits/search', [ProduitController::class, 'search'])->name('produits.search');


Route::get('/recu/{commande}', [RecuController::class, 'download'])->name('recu.download');


Route::get('/total_journalier', [CommandeController::class, 'totalJournalier'])->name('totalJournalier');

Route::get('/all_commandes', [CommandeController::class, 'all_commande'])->name('allCommande');

Route::get('/all_depenses', [DepenseController::class, 'all_depenses'])->name('allDepenses');


Route::get('/statistiques', [CommandeController::class, 'statistiques'])->name('commandes.statistiques');




Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
