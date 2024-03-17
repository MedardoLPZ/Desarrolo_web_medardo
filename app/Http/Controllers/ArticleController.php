<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the articles.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = Article::all();
        return view('Article', compact('articles'));
    }

    /**
     * Show the form for creating a new article or editing an existing one.
     *
     * @param  int|null  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request, $id = null)
    {
        $article = $id ? Article::findOrFail($id) : null;
        $categories = Category::all();
        return view('Article_create', compact('article', 'categories'));
    }
    

    /**
     * Store or update the specified article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'category_id' => 'required|numeric'
        ]);
        
        Article::create($request->all());
    
        return redirect()->route('articles.index')->with('success', '¡El artículo se ha guardado exitosamente!');
    }
    public function update(Request $request, $id){
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'author' => 'required|string|max:255',
        'category_id' => 'required|numeric'
    ]);

    $article = Article::findOrFail($id);
    $article->update($request->all());

    return redirect()->route('articles.index')->with('success', '¡El artículo se ha actualizado exitosamente!');
    }


    /**
     * Display the specified article for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('Article_create', compact('article', 'categories'));
    }




    public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();
    return redirect()->route('articles.index')->with('success', '¡El artículo se ha eliminado correctamente!');
}






}

