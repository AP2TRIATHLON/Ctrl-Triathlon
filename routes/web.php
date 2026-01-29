<?php

use App\Http\Controllers\InfirmierController;
use App\Http\Controllers\LaboratoireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'role_id' => \App\Models\User::get('role_id'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [RoleController::class, 'change'])->name('profile.change-role');


    Route::get("/laboratoire", [LaboratoireController::class,"dashboard"])->name("laboratoire.dashboard");


    Route::get("/infirmier", [InfirmierController::class,"dashboard"])->name("infirmier.dashboard");

    Route::get("/infirmier/labo", [InfirmierController::class,"listLaboratoire"])->name("infirmier.listeLaboratoire");
    Route::get("/infirmier/labo/{nom_labo}", [InfirmierController::class,"infoLaboratoire"])->name("infirmier.infoLabo");


    Route::get("/infirmier/produit", [InfirmierController::class,"listProduitDopant"])->name("infirmier.listeProduitDopants");


    Route::get("/infirmier/prelevement", [InfirmierController::class,"viewPrelevement"])->name("infirmier.viewPrelevement");
    Route::post("/infirmier/generatePrelevement", [InfirmierController::class,"generatePrelevement"])->name("infirmier.generatePrelevement");
});

require __DIR__.'/auth.php';
