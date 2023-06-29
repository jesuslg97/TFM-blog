<?php

namespace App\Http\Controllers;

use App\Comment;
use App\PostLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use \Validator;

class CommentController extends Controller
{
    public function create(){
        return view('comments.create');
    }

    public function store(Request $request){
        $this->validatePostLang($request)->validate();
        $postsLang = PostLang::all();

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->userId;
        $comment->save();

        return redirect()->route('postsLang.show', ['postsLang'=>$postsLang])->with('success', Lang::get('alerts.postsLang_created_successfully'));
    }

    protected function validatePostLang($request) {
        return Validator::make($request->all(), [
            'comment' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}
