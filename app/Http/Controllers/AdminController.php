<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view ('index', [
            "title" => "Sistema Jestaun Finanseiru MEGTELCO",
            "user"=> Auth::user()
        ]);

    }
}
