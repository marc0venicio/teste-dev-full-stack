<?php

declare(strict_types=1);

use App\Presenter\Http\User\Create\CreateUserController;
use App\Presenter\Http\User\Load\LoadUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::post('', CreateUserController::class);
    Route::get('', CreateUserController::class);
    Route::get('/{userId}', LoadUserController::class);
});
