<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $user;
    private $comment;

    public function __construct(User $user, Comment $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
    }

    public function index($userId)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->route('users.index');
        }

        $comments = $user->comments()->get();

        return view('usuarios.comentarios.index', compact('user', 'comments'));
    }

    public function create($userId)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->back();
        }

        return view('usuarios.comentarios.create', compact('user'));
    }

    public function store(Request $request, $userId)
    {
        if(!$user = $this->user->find($userId))
        {
            return redirect()->route('users.index');
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('user.comment.index', $user->id);
    }

    public function edit($user_id, $comment_id)
    {
        if(!$comment = $this->comment->find($comment_id))
            return redirect()->back();

        $user = $comment->user;
        
        return view('usuarios.comentarios.edit', compact('user', 'comment')); 
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        if(!$comment = $this->comment->find($id))
            return redirect()->back();

        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('user.comment.index', $comment->user_id);
    }


}
