<?php

use App\Http\Controllers\V1\Frontend\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/frontend')->group(function () {
    Route::post('/tenants', [FrontendController::class, 'storeTenant']);
});
