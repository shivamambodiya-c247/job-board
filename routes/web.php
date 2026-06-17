<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('', fn() => to_route('jobs.index'));

Route::get('jobs/filter', [JobController::class, 'filter'])->name('jobs.filter');

Route::resource('jobs', JobController::class); 
