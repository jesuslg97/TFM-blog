<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use \Validator;

class CategorieController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){

        $categoryImage = null;
        if($request->has('categoryImage')) {

            $categoryImage = $request->categoryImage;
            $categories = Categorie::where('image_path', 'like', '%'. $categoryImage . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $categories = Categorie::paginate(self::PAGINATE_SIZE);

        }

        return view('categories.index', ['categories'=>$categories, 'categoryImage'=>$categoryImage]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validateCategory($request)->validate();

        $category = new Categorie();
        $category->image_path = $request->categoryImage;
        $category->save();

        return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_created_successfully'));
    }

    public function edit(Categorie $category){
        return view('categories.edit', ['category'=>$category]);
    }

    public function update(Request $request, Categorie $category){
        $this->validateCategory($request)->validate();
        $category->image_path = $request->categoryImage;
        $category->save();

        return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_update_successfully'));
    }

    public function delete(Request $request, Categorie $category){
        if($category != null) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', Lang::get('alerts.categories_delete_successfully'));
        }
        return redirect()->route('categories.index')->with('error', Lang::get('alerts.categories_delete_error'));
    }

    protected function validateCategory($request) {
        return Validator::make($request->all(), [
            'categoryImage' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}
