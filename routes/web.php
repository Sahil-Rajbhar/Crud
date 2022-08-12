<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudEmpController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('check',function(){

    if(DB::connection()->getPdo())
            {
                echo "Successfully connected to the database => "
                             .DB::connection()->getDatabaseName();
            }




});

Route::resource('employe','CrudEmpController');  


































// just for checking connection with database .....
Route::get('check' , function(){
  
            if(DB::connection()->getDatabaseName())
                {
                    echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";

                }
            else{
                    echo "not connected";
                }



});