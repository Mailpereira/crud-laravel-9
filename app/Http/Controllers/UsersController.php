<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
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

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        //dd($request->all());
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        User::create($data);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }

        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);
        
        $user->update($data);
        return redirect()->route('users.index');
    }
}
