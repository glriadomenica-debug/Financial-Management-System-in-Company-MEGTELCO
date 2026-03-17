<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Prosesu login & logout

class sessionController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Prenxe ita-bot nia Email',
            'password.required'=>'Prenxe ita-bot nia Password',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

      // Redirect based on role
      $user = Auth::user();
      switch($user->role) {
        case 'superadmin':
            return redirect()->route('dashboard');
          case 'admin':
              return redirect()->route('dashboard');
          case 'diretor':
              return redirect()->route('dashboard');
          case 'finansas':
              return redirect()->route('dashboard');
          default:
              return redirect()->route('dashboard');
      }
    }
        return back()->withErrors([
            'email' => 'Email ka Password sala',
        ])->onlyInput('email');
        }
            

    
    function logout() {
        Auth::logout();
        return redirect('');
    }
}
