<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLang;
use App\Comment;
use App\Post;
use App\PostLang;
use App\Language;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

        return view('postsLang.index', ['postLangs'=>$postLangs, 'title'=>$title, 'description'=>$description,
            'information'=>$information ,'posts'=>$posts,'languages'=>$languages]);
    }

    public function create(){
        $posts = Post::all();
        $languages = Language::all();
        $categoriesLang = CategoryLang::all();
        $users = User::all();

        return view('postsLang.create',['posts'=>$posts,'languages'=>$languages,
            'categoriesLang'=>$categoriesLang,'users'=>$users]);
    }

    public function store(Request $request){
        $this->validatePostLang($request)->validate();

        $post = new Post();
        $post->category_id = $request->postCategory;
        $post->author_id = $request->authorId;
        $post->image_path = $request->postImage;

        if($request->hasFile("postImage")) {
            $imagen = $request->file("postImage");
            $nameImage = $imagen->getClientOriginalName();
            Storage::putFileAs('public/images/posts', (string)$imagen, $nameImage);
            $post->image_path = $nameImage;
        }

        $post->save();

        $postLang = new PostLang();
        $postLang->title = $request->title;
        $postLang->description = $request->description;
        $postLang->information = $request->information;
        $postLang->post_id = $post->id;
        $postLang->lang_id = $request->langID;
        $postLang->save();

        return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLang_created_successfully'));
    }

    public function edit(PostLang $postLang){
        $posts = Post::all();
        $languages = Language::all();
        $categories = Category::all();
        $categoryLang = CategoryLang::all();

        return view('postsLang.edit',['postLang'=>$postLang,'posts'=>$posts,'languages'=>$languages,
            'categories'=>$categories,'categoryLang'=>$categoryLang]);
    }

    public function update(Request $request, PostLang $postLang){
        $this->validatePostLang($request)->validate();

        $post = new Post();
        $post->category_id = $request->postCategory;
        $post->author_id = $request->authorId;
        $post->image_path = $request->postImage;

        if($request->hasFile("postImage")) {
            $imagen = $request->file("postImage");
            $nameImage = $imagen->getClientOriginalName();
            Storage::putFileAs('public/images/posts', (string)$imagen, $nameImage);
            $post->image_path = $nameImage;
        }

        $post->save();

        $postLang->title = $request->title;
        $postLang->description = $request->description;
        $postLang->information = $request->information;
        $postLang->post_id = $post->id;
        $postLang->lang_id = $request->langID;
        $postLang->save();

        return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLang_update_successfully'));
    }

    public function delete(Request $request, PostLang $postLang){
        if($postLang != null) {
            $postLang->delete();
            return redirect()->route('postsLang.index')->with('success', Lang::get('alerts.postsLang_delete_successfully'));
        }
        return redirect()->route('postsLang.index')->with('error', Lang::get('alerts.postsLang_delete_error'));
    }

    public function show($id) {
        $categoriesLang = Category::all();
        $postLang = PostLang::findOrFail($id);
        $comments = Comment::all();
        $users = User::all();
        $posts = Post::all();

        return view('postsLang.show',['categoriesLang'=>$categoriesLang, 'comments'=>$comments,
            'users'=>$users, 'posts'=>$posts], compact('postLang'));
    }

    protected function validatePostLang($request) {
        return Validator::make($request->all(), [
            'postImage' => ['required', 'min:1'],
            'title' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['required', 'string', 'max:255', 'min:1'],
            'information' => ['required', 'string', 'max:2000', 'min:1']
        ]);
    }
}
