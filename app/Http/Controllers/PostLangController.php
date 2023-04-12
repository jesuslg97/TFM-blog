<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostLang;
use App\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class PostLangController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){
        $posts = Post::all();
        $languages = Language::all();

        $title = null;
        $description = null;
        $information = null;

        if($request->has('title') || $request->has('description') || $request->has('information')) {

            $title = $request->title;
            $description = $request->description;
            $information = $request->information;

            $postLangs = PostLang::where('title', 'like', '%'. $title . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $postLangs = PostLang::paginate(self::PAGINATE_SIZE);

        }

        return view('postsLang.index', ['postLangs'=>$postLangs, 'title'=>$title, 'description'=>$description, 'information'=>$information ,'posts'=>$posts,'languages'=>$languages]);
    }

    public function create(){
        $posts = Post::all();
        $languages = Language::all();
        return view('postsLang.create',['posts'=>$posts,'languages'=>$languages]);
    }

    public function store(Request $request){
        $this->validatePostLang($request)->validate();

        $postLang = new PostLang();
        $postLang->title = $request->title;
        $postLang->description = $request->description;
        $postLang->information = $request->information;
        $postLang->save();

        return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLangs_created_successfully'));
    }

    public function edit(PostLang $postLang){
        $posts = Post::all();
        $languages = Language::all();

        return view('postsLang.edit',['postLang'=>$postLang,'posts'=>$posts,'languages'=>$languages]);
    }

    public function update(Request $request, PostLang $postLang){
        $this->validatePostLang($request)->validate();

        $postLang->title = $request->title;
        $postLang->description = $request->description;
        $postLang->information = $request->information;
        $postLang->save();

        return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLangs_update_successfully'));
    }

    public function delete(Request $request, PostLang $postLang){
        if($postLang != null) {
            $postLang->delete();
            return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLangs_delete_successfully'));
        }
        return redirect()->route('postsLang.index')->with('error', Lang::get('alerts.postsLangs_delete_error'));
    }

    protected function validatePostLang($request) {
        return Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['required', 'string', 'max:255', 'min:1'],
            'information' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}
