<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLang;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use \Validator;

class CategorieController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){

        $name = null;
        $categoryImage = null;

        if($request->has('name') || $request->has('categoryImage')) {

            $name = $request->name;
            $categoryImage = $request->categoryImage;
            $categories = Category::where('name', 'like', '%'. $name . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $categories = Category::paginate(self::PAGINATE_SIZE);

        }

        return view('categories.index', ['name'=>$name, 'categories'=>$categories, 'categoryImage'=>$categoryImage]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validateCategory($request)->validate();

        $category = new Category();
        $category->name = $request->name;
        $category->image_path = $request->categoryImage;

        if($request->hasFile("categoryImage")) {
            $imagen = $request->file("categoryImage");
            $nameImage = $imagen->getClientOriginalName();
            Storage::putFileAs('public/images/categories', (string)$imagen, $nameImage);
            $category->image_path = $nameImage;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_created_successfully'));
    }

    public function edit(Category $category){
        return view('categories.edit', ['category'=>$category]);
    }

    public function update(Request $request, Category $category){
        $this->validateCategory($request)->validate();

        $category->name = $request->name;
        $category->image_path = $request->categoryImage;

        if($request->hasFile("categoryImage")) {
            $imagen = $request->file("categoryImage");
            $nameImage = $imagen->getClientOriginalName();
            Storage::putFileAs('public/images/categories', (string)$imagen, $nameImage);
            $category->image_path = $nameImage;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_update_successfully'));
    }

    public function delete(Request $request, Category $category){
        if($category != null) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_delete_successfully'));
        }
        return redirect()->route('categories.index')->with('error', Lang::get('alerts.categories_delete_error'));
    }

    public function show($id) {
        $categoryLang = CategoryLang::findOrFail($id);
        $category = Category::findOrFail($id);
        $posts = Post::all();

        return view('categories.show', ['posts'=>$posts],
            compact('category','categoryLang'));
    }

    protected function validateCategory($request) {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'categoryImage' => ['required', 'min:1']
        ]);
    }
}
