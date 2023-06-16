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
        $categoriesLang = CategoryLang::all();
        $categories = Categorie::all();

        return view('welcome',['categoriesLang'=>$categoriesLang, 'categories'=>$categories]);
    }
    public function aboutUs() {
        return view('aboutUs');
    }

    public function contact() {
        return view('contact');
    }
}
