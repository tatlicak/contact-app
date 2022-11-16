<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{   // If controller have only have single action, using __invoke is best approach
    public function __invoke()
    {
        return view('welcome');
    }
}
