<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', fn () => view('ticket'));
Route::post('/ticket/reserve', [TicketController::class, 'store'])->name('ticket.reserve');

Route::get('/', function () {
    return view('welcome');
});
