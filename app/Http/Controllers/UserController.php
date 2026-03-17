<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:edit-users')->only(['edit', 'update']);
    }
    // public function __construct()
    // {
    // $this->middleware('can:manage-users')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    // }
    public function index()
    {
        $users = User::all();
        return view('user.dadusUser', compact('users'), [
            'title' => 'Dadus User'
        ]);
    }
    public function create()
    {
        return view('user.rejistuUser',[
            'title'=>'Rejistu User'
        ]);
    }

    public function store(Request $request)
    {
        Log::debug('Store method called', ['request' => $request->all()]);
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|max:8',
           'role' => ['required', 'string', Rule::in(['superadmin','admin', 'finansas', 'diretor'])]
        ]);

        Log::debug('Validation passed', ['validated' => $validated]);

        $user = user::create([
            'name' => $validated['name'],
            'email' =>$validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role']
        ]);

        Log::debug('User kria ona', ['user' => $user]);

        return redirect()->route('user.dadusUser')->with('susesu', 'User rejistu ho susesu!');
    }



    public function destroy($id)
    {
    User::findOrFail($id)->delete();

    // Reset AUTO_INCREMENT 
    DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');

    return redirect()->route('user.dadusUser')->with('susesu', 'Dadus user hamoos ona!');
    }

}