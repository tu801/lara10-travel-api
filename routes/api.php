<?php

use Illuminate\Http\Request;
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

Route::prefix('auth')
    ->group(base_path('routes/api/auth.php'));

Route::prefix('travel')
    ->group(base_path('routes/api/travel.php'));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Fallback
Route::fallback(function () {
    return response()->json([
        'error' => 'Page not found',
    ], 404);
});
