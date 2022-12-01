<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('usuarios.index', compact('users'));
    }

    public function show($id)
    {
        //$user = User::find($id);
        if(!$user = User::where('id', $id)->first()){
            return redirect()->route('users.index');
        }
        return view('usuarios.show', compact('user'));
    }
}
