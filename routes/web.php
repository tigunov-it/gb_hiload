<?php


use App\Http\Controllers\RecursiaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/test', [RecursiaController::class, 'index']);

Route::get('/sort', [\App\Http\Controllers\SortController::class, 'sort']);

Route::get('/memcache', function () {
    Cache::store('memcached')->put('Name', 'John Doe from memcache');
    $value = Cache::get('Name');
    dd($value);
});

Route::get('/redis', function () {
    Cache::store('redis')->put('Name', 'John Doe from redis');
    $value = Cache::get('Name');
    dd($value);
});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Cache::flush();
    return "Кэш очищен.";});
