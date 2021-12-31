<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\CreateAccount;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Dashboard\Home;
use App\Http\Livewire\Dashboard\Applications;
use App\Http\Livewire\Dashboard\Applications\Create;
use App\Http\Livewire\Dashboard\AssignedApplications;
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


// Website Routes
Route::get('/', Login::class)->middleware('guest')->name('auth.login');
Route::get('/create-account', CreateAccount::class)->name('auth.create-account');
Route::get('/forgot-password', ForgotPassword::class)->name('auth.forgot-password');

//Route::get('/articles', ViewArticles::class)->name('articles.view');


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/dashboard', Home::class)->name('dashboard.home');
    Route::get('/dashboard/applications', Applications::class)->name('dashboard.applications');
    Route::get('/dashboard/applications/create', Create::class)->name('dashboard.application.create');
    Route::get('/dashboard/assigned-applications', AssignedApplications::class)->name('dashboard.assigned-applications');
});

