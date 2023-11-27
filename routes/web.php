<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[PostController::class, 'index'])->name('home');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
