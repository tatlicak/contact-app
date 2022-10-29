<?php

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
    $html="
    <h1>
    Contact App
    </h1>
    <div>
        <a  href=".route('contact.index').">All Contact </a>
        <a  href=".route('contact.create').">Add Contact</a>
        <a  href=".route('contact.show',1523).">Show Contact</a>
    </div>
    ";
    return $html;
})->name('homePage');

Route::prefix('admin')->group(function(){
    /* Route Examples */
Route::get('/contacts', function () {
    return "<h1>All Contacts</h1>";
})->name('contact.index');

Route::get('/contacts/create', function () {
    return "<h1>Add Contact</h1>";
})->name('contact.create');

/* Route Parameters */

Route::get('contacts/{id}', function ($id) {
    return "Contact ID: ".$id;
})->whereNumber("id")->name('contact.show');
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

});

Route::fallback(function(){

    return "<h1>Sorry! Page Not Found... Return <a href=".route('homePage').">Home Page</a></h1>";
});