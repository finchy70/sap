<?php

use App\Http\Controllers\MessageController;
use App\Livewire\AdminPage;
use App\Livewire\Dashboard;
use App\Livewire\NewMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin', AdminPage::class)->name('adminPage');

    Route::get('message/{message}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::get('/new-message', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/store-message', [MessageController::class, 'store'])->name('messages.store');
});
