<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Checklist\ChecklistCreateController;
use App\Http\Controllers\API\Register\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', LoginController::class)->name('login');

Route::post('/register', RegisterController::class)->name('register');


Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('checklists')->name('checklist.')->group(function () {
        Route::post('/', ChecklistCreateController::class)->name('create');
    });

});
