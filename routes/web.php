<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\RequestInvitation;
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

Route::get('/', App\Http\Livewire\Welcome::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register/request', RequestInvitation::class)->name('register.request');

    Route::get('register', Register::class)
        ->name('register')
        ->middleware('hasInvitation');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/admin', App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/bowls', App\Http\Livewire\Bowl\BowlIndex::class)->name('admin.bowl-index');
    Route::get('/admin/bowls/edit/{bowl}', App\Http\Livewire\Bowl\BowlEdit::class)->name('admin.bowl-edit');

    Route::get('/admin/users', App\Http\Livewire\User\UserIndex::class)->name('admin.user-index');
    Route::get('/admin/invitations', App\Http\Livewire\Invitation\InvitationIndex::class)->name('admin.invitation-index');
});

Route::middleware('auth')->group(function() {
    Route::get('/pickem', App\Http\Livewire\Pick\PickForm::class)->name('pick-form');
    Route::get('/picks', App\Http\Livewire\Score\TotalScore::class)->name('all.picks');
    Route::get('/picks/{user:username}', App\Http\Livewire\Pick\UserPick::class)->name('user.picks');
    Route::get('/bowls/{bowl:api_id}', App\Http\Livewire\BowlProfile::class)->name('bowl.profile');
});