<?php

use Illuminate\Support\Facades\Route;

Route::post('/transaction', 'TransactionController@transaction')->name('transaction');