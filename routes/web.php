<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MitumoriController;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/top', [TopController::class, 'index'])->name('top');

    Route::get('/member', [MemberController::class, 'index'])->name('member.list');
    Route::get('/member/show/{member}', [MemberController::class, 'show'])->name('member.show');
    Route::get('/member/add', [MemberController::class, 'add'])->name('member.add');
    Route::post('/member/add', [MemberController::class, 'create']);
    Route::get('/member/edit/{member}', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('/member/edit/{member}', [MemberController::class, 'update']);
    Route::get('/member/delete/{member}', [MemberController::class, 'delete'])->name('member.delete');
    Route::post('/member/delete/{member}', [MemberController::class, 'remove']);

    Route::get('/card', [CardController::class, 'index'])->name('card.list');
    Route::get('/card/add', [CardController::class, 'add'])->name('card.add');
    Route::post('/card/add', [CardController::class, 'create']);
    Route::get('/card/show/{card}', [CardController::class, 'show'])->name('card.show');
    Route::get('/card/edit/{card}', [CardController::class, 'edit'])->name('card.edit');
    Route::post('/card/edit/{card}', [CardController::class, 'update']);
    Route::get('/card/delete/{card}', [CardController::class, 'delete'])->name('card.delete');
    Route::post('/card/delete/{card}', [CardController::class, 'remove']);

    Route::get('/mitumori/add_price', [MitumoriController::class, 'addPrice'])->name('mitumori.add.price');
    Route::post('/mitumori/add_note', [MitumoriController::class, 'addNote'])->name('mitumori.add.note');
    Route::post('/mitumori/add_hosoku', [MitumoriController::class, 'addHosoku'])->name('mitumori.add.hosoku');
    Route::post('/mitumori/add_date', [MitumoriController::class, 'addDate'])->name('mitumori.add.date');
    Route::post('/mitumori/complete', [MitumoriController::class, 'complete'])->name('mitumori.complete');
    Route::post('/mitumori/register', [MitumoriController::class, 'register'])->name('mitumori.register');
    Route::get('/mitumori/list', [MitumoriController::class, 'list'])->name('mitumori.list');
    Route::get('/mitumori/print/{mitumori}', [MitumoriController::class, 'print'])->name('mitumori.print');
    Route::get('/mitumori/show/{mitumori}', [MitumoriController::class, 'show'])->name('mitumori.show');
    Route::post('mitumori/show_branch', [MitumoriController::class, 'showBranch'])->name('show.branch');

    Route::get('/mitumori/edit_price/{mitumori}', [MitumoriController::class, 'editPrice'])->name('mitumori.edit.price');
    Route::post('/mitumori/edit_note/{mitumori}', [MitumoriController::class, 'editNote'])->name('mitumori.edit.note');
    Route::post('/mitumori/edit_hosoku/{mitumori}', [MitumoriController::class, 'editHosoku'])->name('mitumori.edit.hosoku');
    Route::post('/mitumori/edit_date/{mitumori}', [MitumoriController::class, 'editDate'])->name('mitumori.edit.date');
    Route::post('/mitumori/edit_complete/{mitumori}', [MitumoriController::class, 'editComplete'])->name('mitumori.edit.complete');
    Route::post('/mitumori/update/{mitumori}', [MitumoriController::class, 'update'])->name('mitumori.update');
    Route::get('/mitumori/edit_show/{mitumori}', [MitumoriController::class, 'editShow'])->name('mitumori.edit.show');
    Route::get('/mitumori/delete{mitumori}', [MitumoriController::class, 'delete'])->name('mitumori.delete');
});
