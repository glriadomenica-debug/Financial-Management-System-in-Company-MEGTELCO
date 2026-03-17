<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiputransaksaun;
use Illuminate\Support\Facades\DB;


class TipuTransaksaunController extends Controller
{
    public function index()
    {
        $tiputransaksauns = tiputransaksaun::all();
        return view('tiputransaksaun.dadus', compact('tiputransaksauns'), [
            'title' => 'Tipu transaksaun'
        ]);
    }
    
    public function create()
    {
        return view('tiputransaksaun.tiputransaksaun',[
            'title'=>'Rejistu tipu transaksaun'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipu_transaksaun' => 'required|string|max:255|unique:tiputransaksauns,tipu_transaksaun'
        ]);

        tiputransaksaun::create([
            'tipu_transaksaun' => $request->tipu_transaksaun
        ]);

        return redirect()->route('tiputransaksaun.dadus')->with('susesu', 'Tipu transaksaun rejistu ho susesu!');
    }

    public function destroy($id)
    {
    tiputransaksaun::findOrFail($id)->delete();

    // Reset AUTO_INCREMENT 
    DB::statement('ALTER TABLE tiputransaksauns AUTO_INCREMENT = 1');

    return redirect()->route('tiputransaksaun.dadus')->with('susesu', 'Tipu transaksaun hamoos ona!');
    }

    
}
