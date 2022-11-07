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
function getContacts(){

    return [
        1=>['name'=>'Name-1', 'phone'=>"555-555-5555"],
        2=>['name'=>'Name-2', 'phone'=>"666-666-6666"],
        3=>['name'=>'Name-3', 'phone'=>"777-777-7777"],
        4=>['name'=>'Name-4', 'phone'=>"888-888-8888"]
    ];

}

Route::get('/', function () {
    
    return view('welcome');
})->name('homePage');

Route::prefix('admin')->group(function(){
    /* Route Examples */

Route::get('/contacts', function () {

    $companies = [
        1 => ['name' => 'Company One', 'contacts' => 3],
        2 => ['name' => 'Company Two', 'contacts' => 5],
    ];

    $contacts=getContacts();

    return view('contacts.index',compact('contacts','companies'));
})->name('contact.index');


Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contact.create');

/* Route Parameters */

Route::get('contacts/{id}', function ($id) {

    $contacts=getContacts();

        abort_if(!isset($contacts[$id]),404);
        //abort_unless(!isset($contacts[$id]),404);

    $contact=$contacts[$id];

    return view('contacts.show')->with('contact',$contact);

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