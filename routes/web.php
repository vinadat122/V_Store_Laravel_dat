<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemSaleController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/item-sale/create', [ItemSaleController::class, 'create'])->name('items.create');


Route::post('/item-sale/store', [ItemSaleController::class, 'store'])->name('items.store');

Route::get('/item-sale', [ItemSaleController::class, 'index'])->name('items.index');

Route::get('/item-sale/edit/{id}', [ItemSaleController::class, 'edit'])->name('items.edit');


Route::post('/item-sale/update/{id}', [ItemSaleController::class, 'update'])->name('items.update');
