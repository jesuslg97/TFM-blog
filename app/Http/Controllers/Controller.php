<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\CategoryLang;
use App\PostLang;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(){
        $categoryLangs = CategoryLang::all();
        $postsLang = PostLang::all();
        $categories = Categorie::all();

        return view('welcome',['categoryLangs'=>$categoryLangs, 'postsLang'=>$postsLang, 'categories'=>$categories]);
    }
    public function aboutUs() {
        return view('aboutUs');
    }

    public function contact() {
        return view('contact');
    }
}
