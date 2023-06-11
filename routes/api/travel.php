<?php
/**
 * Author: tmtuan
 * Created date: 6/11/2023
 * Project: travel-api
 **/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Travel;


Route::middleware('auth:sanctum')->group(function () {
    Route::controller(Travel::class)->group(function () {
        Route::post('/create', 'store');
    });
});
