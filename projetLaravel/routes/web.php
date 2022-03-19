<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\CorrectionController;


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

Route::get('/',[EpreuveController::class,'index'])->name('home');

Route::get('/newsletter', function () {
    return view('contact');
})->name('newsletter');
Route::post('/newsletter/envoi',[RegisteredUserController::class,'newsletter'])->name('envoi');



require __DIR__.'/auth.php';

Route::prefix('/users')->name('users.')->group(function()
{
    Route::get('/{id}',[RegisteredUserController::class,'show'])->name('show');
    Route::get('/{id}/edit',[RegisteredUserController::class,'edit'])->name('edit');
    Route::get('/{id}/epreuves/create',[EpreuveController::class,'create'])->name('create_epreuve');
    Route::post('/{id}/epreuves/store',[EpreuveController::class,'store'])->name('store_epreuve');
    Route::post('/{id}/update',[RegisteredUserController::class,'update'])->name('update');
    Route::get('/{id}/delete',[RegisteredUserController::class,'destroy'])->name('delete');
    Route::get('/{id}/dashboard',[RegisteredUserController::class,'dashboard'])->name('dashboard');
});

Route::prefix('/epreuves')->name('epreuves.')->group(function()
{
    Route::get('/{id}',[EpreuveController::class,'show'])->name('show');
    Route::get('/{id}/edit',[EpreuveController::class,'edit'])->name('edit');
    Route::post('/{id}/update',[EpreuveController::class,'update'])->name('update');
    Route::get('/{id}/download',[EpreuveController::class,'download'])->name('download');
    Route::get('/{id}/delete',[EpreuveController::class,'destroy'])->name('delete');
    Route::get('/{id}/corrections/create',[CorrectionController::class,'create'])->name('create_correction');
    Route::post('/{id}/corrections/store',[CorrectionController::class,'store'])->name('store_correction');
});

Route::prefix('/corrections')->name('corrections.')->group(function()
{
    Route::get('/{id}',[CorrectionController::class,'show'])->name('show');
    Route::get('/{id}/edit',[CorrectionController::class,'edit'])->name('edit');
    Route::post('/{id}/update',[CorrectionController::class,'update'])->name('update');
    Route::get('/{id}/download',[CorrectionController::class,'download'])->name('download');
    Route::get('/{id}/delete',[CorrectionController::class,'destroy'])->name('delete');
});