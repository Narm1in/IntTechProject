<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\SesTransport;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->author = $request->author;
        $article->slug = Str::slug($article->title);

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'description' => 'required',
        ]);

        $article->save();



        if ($article) {
            toastr()->success('Data has been saved successfully!');

            return redirect()->route('articles.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $article = Article::findOrFail($id);
        return view('admin.articles.update', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->author = $request->author;
        $article->slug = Str::slug($article->title);


        $article->save();



        //if ($article) {
          //  toastr()->success('Data has been saved successfully!');

        return redirect()->route('articles.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

public function showArticle($id){
    $article = Article::find($id);
        return view('admin.articles.show', compact('article'));
}

}
