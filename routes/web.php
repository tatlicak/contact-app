<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController;

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

//__invoke() is used in controller
Route::get('/', WelcomeController::class)->name('homePage');


Route::controller(ContactController::class)->group(function(){

/* Route Examples */

 Route::get('/contacts', 'index')->name('contact.index');
 Route::post('/contacts', 'store')->name('contact.post');


Route::get('/contacts/create','create')->name('contact.create');

/* Route Parameters */
Route::get('contacts/{id}','show')->whereNumber("id")->name('contact.show');
});
    
//->where('id','[0-9]+'); //for Numeric 

/*Route::resource('/companies', CompanyController::class);

Route::resources(['/tags'=>TagController::class,

                   '/tasks'=>TaskController::class 
]);


 */