<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\CategoryLang;
use App\Language;
use App\Post;
use App\PostLang;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const PAGINATE_SIZE = 10;

    public function welcome(){
        $categoriesLang = CategoryLang::all();
        $categories = Categorie::all();

        return view('welcome',['categoriesLang'=>$categoriesLang, 'categories'=>$categories]);
    }
    public function app(){
        $categoriesLang = Categorie::all();

        return view('welcome',['categoriesLang'=>$categoriesLang]);
    }

    public function last_post() {
        $categoriesLang = Categorie::all();
        $posts = Post::all();
        $languages = Language::all();

        $postLangs = PostLang::paginate(self::PAGINATE_SIZE);

        return view('last_post', ['categoriesLang'=>$categoriesLang, 'postLangs'=>$postLangs ,'posts'=>$posts,'languages'=>$languages]);
    }

    public function aboutUs() {
        $categoriesLang = Categorie::all();

        return view('aboutUs', ['categoriesLang'=>$categoriesLang]);
    }

    public function contact() {
        $categoriesLang = Categorie::all();

        return view('contact', ['categoriesLang'=>$categoriesLang]);
    }
}
