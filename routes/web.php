<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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

use App\Http\Controllers\EmployeeEmailValidationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $userName = $user->name;
    return view('dashboard',compact('userName'));   
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('employees','EmployeeController');

// Route::post('/')
Route::post('employees/create', [EmployeeEmailValidationController::class, 'index'])->name('email.validate');

Route::get('/edit-profile', 'EditProfileController@edit')->name('user.edit');

Route::post('/update/{id}','EditProfileController@update')->name('user.update');