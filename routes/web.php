<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;

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

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', Dashboard::class)->name('dashboard')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Important Routes
|--------------------------------------------------------------------------
*/
Route::get('/migration', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();

    Artisan::call('migrate', ['--force' => true], $output);

    Artisan::call('db:seed', ['--force' => true], $output);

    echo '<pre>';
    return $output->fetch();
});


Route::get('/optimize', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();

    // Clear Cache
    Artisan::call('optimize:clear', [], $output);
    // Create Storage Link
    Artisan::call('storage:link', [], $output);

    Artisan::call('optimize', [], $output);
    // Route Cache
    Artisan::call('route:cache', [], $output);
    // Clear Route Cache
    Artisan::call('route:clear', [], $output);
    // Clear View Cache
    Artisan::call('view:clear', [], $output);
    // Clear Config Cache
    Artisan::call('config:cache', [], $output);
    // Clear Config Cache (again, if necessary)
    Artisan::call('config:clear', [], $output);

    echo '<pre>';
    return $output->fetch();
})->name('optimize');
