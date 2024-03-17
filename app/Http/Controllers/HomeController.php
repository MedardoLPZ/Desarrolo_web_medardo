<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all(); // Obtener todos los artículos
        return view('home', compact('articles')); // Pasar los artículos a la vista
    }
    public function welcomnw()
    {
        $articles = Article::all(); // Obtener todos los artículos
        return view('welcome', compact('articles')); // Pasar los artículos a la vista
    }
}
