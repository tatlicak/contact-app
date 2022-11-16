<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WelcomeController;
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

//__invoke() is used in controller
Route::get('/', WelcomeController::class)->name('homePage');

Route::controller(ContactController::class)->name('contacts.')->group(function(){

/* Route Examples */

Route::get('/contacts', 'index')->name('index');


Route::get('/contacts/create','create')->name('create');

/* Route Parameters */

Route::get('contacts/{id}','show')->whereNumber("id")->name('show');
});
    
//->where('id','[0-9]+'); //for Numeric 

Route::get('companies/{name?}', function ($name=null) {

    if ($name){
            
        return "Company: ".$name;

    }else{

        return "All Companies";
    }
})->whereAlphaNumeric("name")->name('contact.name');
//->whereAlpha("name");//for Alpha
//->where('name','[a-zA-Z]+'); //for Alpha



Route::fallback(function(){

    return "<h1>Sorry! Page Not Found... Return <a href=".route('homePage').">Home Page</a></h1>";
});