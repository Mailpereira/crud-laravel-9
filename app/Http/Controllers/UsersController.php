<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    protected $user; //injeção de dependencia
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        if($busca = $request->search){
            $users = $this->user->where('name', 'LIKE', "%{$busca}%")->get();
            return view('usuarios.index', compact('users'));
        }
        $users = User::get();
        //dd($users);
        return view('usuarios.index', compact('users'));
    }

    public function show($id)
    {
        //$user = User::find($id);
        if(!$user = $this->user->where('id', $id)->first()){
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

        if($request->image){
            //pegando a extensão do arquivo de imagem e salvando com a data atual
            //$extension = $request->image->getClientOriginalExtension();
            //$data['image'] = $request->image->storeAs('image-user', now() . "{$extension}");
            $data['image'] = $request->image->store('image-user');
        }
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        $this->user->create($data);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$user = $this->user->find($id)){
            return redirect()->route('users.index');
        }

        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = $this->user->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);
        
        if($user->image && Storage::exists($user->image)){
            Storage::delete($user->image);
        }
        $data['image'] = $request->image->store('image-user');
        
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->user->find($id)){
            return redirect()->route('users.index');
        }       

        $user->delete();
        return redirect()->route('users.index');
    }
}
