<?php

/**
 * I dont like to use the Laravel Route Group because you cant find easily the routes
 */
Route::get('/funds', [\App\Modules\Core\Controllers\FundController::class, 'index']);
Route::put('/funds/{fund}', [\App\Modules\Core\Controllers\FundController::class, 'update']);
Route::post('/funds', [\App\Modules\Core\Controllers\FundController::class, 'create']);
Route::delete('/funds/{fund}', [\App\Modules\Core\Controllers\FundController::class, 'destroy']);
Route::get('/funds/duplicates', [\App\Modules\Core\Controllers\FundController::class, 'duplicates']);


Route::post('/funds/duplicated', [\App\Modules\Core\Controllers\DuplicatedFundsController::class, '__invoke']);
