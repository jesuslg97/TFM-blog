<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLang;
use App\Language;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class CategoryLangController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){
        $categories = Category::all();
        $languages = Language::all();

        $name = null;
        $description = null;

        if($request->has('name') || $request->has('description')) {

            $name = $request->name;
            $description = $request->description;

            $categoryLangs = CategoryLang::where('name', 'like', '%'. $name . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $categoryLangs = CategoryLang::paginate(self::PAGINATE_SIZE);

        }

        return view('categoriesLang.index', ['categoryLangs'=>$categoryLangs, 'name'=>$name,
            'description'=>$description, 'categories'=>$categories,'languages'=>$languages]);
    }

    public function create(){
        $categories = Category::all();
        $languages = Language::all();
        return view('categoriesLang.create',['categories'=>$categories,'languages'=>$languages]);
    }

    public function store(Request $request){
        $this->validateCategoryLang($request)->validate();

        $categoryLang = new CategoryLang();
        $categoryLang->name = $request->name;
        $categoryLang->description = $request->description;
        $categoryLang->category_id = $request->categoryId;
        $categoryLang->lang_id = $request->langID;
        $categoryLang->save();

        return redirect()->route('categoriesLang.index')->with('success', Lang::get('alerts.categoriesLang_created_successfully'));
    }

    public function edit(CategoryLang $categoryLang){
        $categories = Category::all();
        $languages = Language::all();

        return view('categoriesLang.edit',['categoryLang'=>$categoryLang,'categories'=>$categories,'languages'=>$languages]);
    }

    public function update(Request $request, CategoryLang $categoryLang){
        $this->validateCategoryLang($request)->validate();

        $categoryLang->name = $request->name;
        $categoryLang->description = $request->description;
        $categoryLang->category_id = $request->categoryId;
        $categoryLang->lang_id = $request->langID;
        $categoryLang->save();

        return redirect()->route('categoriesLang.index')->with('success', Lang::get('alerts.categoriesLang_update_successfully'));
    }

    public function delete(Request $request, CategoryLang $categoryLang){
        if($categoryLang != null) {
            $categoryLang->delete();
            return redirect()->route('categoriesLang.index')->with('success', Lang::get('alerts.categoriesLang_delete_successfully'));
        }
        return redirect()->route('categoriesLang.index')->with('error', Lang::get('alerts.categoriesLang_delete_error'));
    }

    public function show($id) {
        $categoriesLang = CategoryLang::all();
        $category = CategoryLang::findOrFail($id);
        $post = Post::findOrFail($id);

        return view('categoriesLang.show', ['categoriesLang'=>$categoriesLang], compact('category', 'post'));
    }

    protected function validateCategoryLang($request) {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}
