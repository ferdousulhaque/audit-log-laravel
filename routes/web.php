<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ChangeFeatureSettings::class, 'view']);


Route::post('/change', [\App\Http\Controllers\ChangeFeatureSettings::class, 'change'])->name('featuresettings.store');