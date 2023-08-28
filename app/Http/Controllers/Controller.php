<?php

namespace App\Http\Controllers;

use App\Category;
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

    const PAGINATE_SIZE = 5;

    public function welcome(){
        $categories = Category::all();

        return view('welcome',['categories'=>$categories]);
    }

    public function last_post() {
        $posts = Post::all();
        $languages = Language::all();

        $postLangs = PostLang::paginate(self::PAGINATE_SIZE);

        return view('last_post', ['postLangs'=>$postLangs ,'posts'=>$posts,'languages'=>$languages]);
    }

    public function aboutUs() {
        return view('aboutUs');
    }

    public function contact() {
        return view('contact');
    }
}
