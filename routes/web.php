<?php

use App\Http\Livewire\User\Profile;
use App\Http\Livewire\User\Document;
use App\Http\Livewire\User\Login;
use App\Http\Livewire\User\Logout;
use App\Http\Livewire\User\Register;
use App\Http\Livewire\User\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function ()
{
    Route::get('/', Register::class)->name('user.register');
    Route::get('/login', Login::class)->name('user.login');
});

Route::middleware(['auth'])->group(function () 
{
    Route::get('/user/profile', Profile::class)->name('user.profile');
    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('/user/document', Document::class)->name('user.document');
});


