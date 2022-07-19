<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articles;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class CreateArticleController extends Controller
{
    public function Create(Request $req) {
        $validation = $req->validate([
            'topic' => 'required',
            'text' => 'required'
        ]);
        $article = new articles();
        $article->topic = $req->input('topic');
        $article->text = $req->input('text');
        $article->user_id = Auth::id();
        $article->save();

        return redirect('/dashboard');
    }
}
