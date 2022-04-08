<?php

use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\EntrepriseDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostulantDashboard;
use App\Models\Entreprise;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::get('MainDash', [EntrepriseDashboard::class, 'index'])->name('maindash');
Route::resource('EntrepriseDash', EntrepriseDashboard::class);
Route::get('showEntreprise', [EntrepriseDashboard::class, 'show'])->name('showEntreprise');
Route::get("voirCandidatCv/{cv}", [EntrepriseDashboard::class, "showCv"]);

Route::get("voirPostulantCv/{cv}", [PostulantDashboard::class, "showCv"]);
Route::get('showPostulant', [PostulantDashboard::class, 'show'])->name('showPostulant');
Route::resource('Dashboard', PostulantDashboard::class);


Route::get('/', function () {
    return view('welcome');
})->name("/");

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource("offre", OffreController::class)->middleware("onlyRecruteur");
Route::get("/listesdesoffres", [OffreController::class, "getAllOffres"])->name("listesdesoffres");
Route::get("Details_Offres", function () {
    return view("offre.voirOffre");
})->name("Details_Offres");


Route::get("candidatures", [CandidatureController::class, "index"]);
Route::get("candidater/{id}", [CandidatureController::class, "store"]);
Route::get("voir/cv/{cv}", [CandidatureController::class, "sendCv"]);
