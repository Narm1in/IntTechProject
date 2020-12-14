<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Category;

class homePageController extends Controller
{
/*
    public function __construct(){
        $pages = Page::orderBy('order','ASC')->get();
        view()->share('pages',$pages);
    }
*/
    public function index(){

        $articles = Article::orderByDesc('created_at')->paginate(3);
        $categories = Category::all();
        return view('homepage',compact('categories', 'articles'));
    }
    public function singlePage($slug){
        $post = Article::where('slug',$slug)->first() ?? abort(404);
        return view('post', compact('post'));
    }
    public function getArticles($slug){
        $category = Category::where('slug',$slug)->first() ?? abort(404);
        $categories = Category::all();
        $articles = Article::where('category_id',$category->id)->orderBy('created_at', 'DESC')->paginate(3);
        return view('homepage', compact('articles', 'categories'));
    }

    public function getPages($slug){
        $content = Page::where('slug',$slug)->first();
        return view('page',compact('content'));
    }
}
