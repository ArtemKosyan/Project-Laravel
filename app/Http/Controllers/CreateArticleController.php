<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articles;
use Illuminate\Support\Facades\Route;

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
        $article->user_id = 0;
        $article->save();

        return redirect('/dashboard');
    }
}
