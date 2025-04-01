<?php

use App\Http\Controllers\ProposedSaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

// Route::put('/user/{id}/update/password', 'ProposedSaleController@index')->name('proposed_sale.index');

Route::resource('proposedsale', ProposedSaleController::class);
