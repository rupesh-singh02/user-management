<?php

use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', UserManagement::class);


Route::get('/migration', function () {
    
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('migrate', ['--force' => true], $output);
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