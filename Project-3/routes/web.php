<?php

use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// -------------------------------- Project_3 Routes ----------------------------------

Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
Route::get('/', [PromotionController::class, 'getPromotions'])->name('promotion.get');
Route::get('/add_promotion', [PromotionController::class, 'addPromotion'])->name('promotion.add');
Route::post('/add_promotion', [PromotionController::class, 'submitPromotion'])->name('promotion.submit');
Route::get('/delete_promotion/{id}', [PromotionController::class, 'deletePromotion'])->name('promotion.delete');
Route::get('/gestion_briefs', [BriefController::class, 'index'])->name('brief.index');
Route::get('/gestion_briefs', [BriefController::class, 'getBriefs'])->name('brief.get');
Route::post('/gestion_briefs', [BriefController::class, 'submitbrief'])->name('brief.submit');
Route::get('/add_brief', [BriefController::class, 'addBrief'])->name('brief.add');
Route::post('/add_brief', [BriefController::class, 'submitbrief'])->name('brief.submit');
Route::get('/gestion_apprenant', [ApprenantController::class, 'index'])->name('apprenant.index');
Route::get('/gestion_apprenant/{id?}', [ApprenantController::class, 'getApprenant'])->name('apprenant.get');
Route::post('/gestion_apprenant', [ApprenantController::class, 'submitApprenant'])->name('apprenant.submit');
Route::get('/add_apprenant', [ApprenantController::class, 'addApprenant'])->name('apprenant.add');
