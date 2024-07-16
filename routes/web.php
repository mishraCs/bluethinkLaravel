<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('welcome',[PagerController::class, 'welcome'])->name('welcome');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// register
Route::match(['get', 'post'], '/register', [PagerController::class, 'register'])->name('register');
// login
Route::match(['get', 'post'], 'login', [PagerController::class, 'login'])->name('login');
// logOut
Route::match(['get', 'post'], 'logOut', [PagerController::class, 'logOut'])->name('logOut');
// Profile
Route::match(['get', 'post'], 'profile', [PagerController::class, 'profile'])->name('profile');