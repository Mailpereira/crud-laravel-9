<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function index()
    {
        return view('alunos.index');
    }

    public function show($id)
    {
        dd('alunos.show', $id);
    }
}
