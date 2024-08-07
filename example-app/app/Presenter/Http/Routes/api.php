<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

foreach (File::allFiles(__DIR__ . '/v1') as $partial) {
    Route::get('health', fn () => response()->json([
            'status' => 'ok', 'working' => true,
        ])
    );
    Route::prefix('/v1')->group($partial->getPathname());
}
