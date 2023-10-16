<?php

use App\Livewire\AdminPage;
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
    Route::get('/dashboard', function () {
        $messages = Message::query()->orderBy('created_at', 'desc')->get();
        return view('dashboard', [
            'messages' => $messages
        ]);
    })->name('dashboard');
    Route::get('/admin', AdminPage::class)->name('adminPage');
});
