<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryLang;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Validator;

class PostController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(Request $request){

        $categories = Category::all();

        $postCategory = null;
        $postImage = null;

        if($request->has('postCategory') || $request->has('postImage')) {

            $postCategory = $request->postCategory;
            $postImage = $request->postImage;

            if($request->has('postCategory')  && !empty($postCategory)){
                $categoryId = Category::where('id','=',$postCategory)->get()->first();
                if($categoryId){
                    $catId = $categoryId->id;
                }else{
                    $catId = 0;
                }

            }else{
                $catId = '';
            }

            $posts = Post::where('image_path', 'like', '%'. $postImage . '%')
                ->where('category', 'like', '%'. $catId . '%')
                ->paginate(self::PAGINATE_SIZE);
        } else {
            $posts = Post::paginate(self::PAGINATE_SIZE);

        }

        return view('posts.index', ['posts'=>$posts, 'categories'=>$categories,'postCategory'=>$postCategory, 'postImage'=>$postImage]);
    }

    public function create(){
        $categoriesLang = CategoryLang::all();
        $users = User::all();

        return view('posts.create',['categoriesLang'=>$categoriesLang, 'users'=>$users]);
    }

    public function store(Request $request){
        $this->validatePost($request)->validate();

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

        return redirect()->route('posts.index')->with('success', Lang::get('alerts.posts_created_successfully'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        $categoriesLang = CategoryLang::all();

        return view('posts.edit', ['post'=>$post, 'categories'=>$categories, 'categoriesLang'=>$categoriesLang]);
    }

    public function update(Request $request, Post $post){
        $this->validatePost($request)->validate();
        $post->category_id = $request->postCategory;
        $post->image_path = $request->postImage;

        if($request->hasFile("postImage")) {
            $imagen = $request->file("postImage");
            $nameImage = $imagen->getClientOriginalName();
            Storage::putFileAs('public/images/posts', (string)$imagen, $nameImage);
            $post->image_path = $nameImage;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', Lang::get('alerts.posts_update_successfully'));
    }

    public function delete(Request $request, Post $post){
        if($post != null) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', Lang::get('alerts.posts_delete_successfully'));
        }
        return redirect()->route('posts.index')->with('error', Lang::get('alerts.posts_delete_error'));
    }

    public function show(Request $request) {

    }

    protected function validatePost($request) {
        return Validator::make($request->all(), [
            'postImage' => ['required', 'min:1']
        ]);
    }
}
