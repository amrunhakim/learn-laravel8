<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        #enkripsi password
        $validated['password'] = bcrypt($validated['password']);

        #dd('regist berhasil');
        User::create($validated);

        #kasih popup flash
        #$request->session()->flash('success', 'registration successfully, please login');

        #redirect login dan penggunaan with utk pengganti flash
        return redirect('/login')->with('success', 'registration successfully, please login');
        
    }
}
