<?php

use App\Http\Controllers\ProposedSaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::resource('proposedsale', ProposedSaleController::class);
