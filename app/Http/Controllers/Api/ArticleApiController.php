<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Log;

 class ArticleApiController extends Controller {
    public function index(){
        // Log::info('se ejecuto api');
        return response()->json([
            'success'=> true,
            'data' => Article::all(),
        ]);

    }

    public function show($id){
        return response()->json([
            'success'=> true,
            'data' => Article::find($id),
        ]);

    }

    public function destroy($id){
        $article = Article::find($id);
        
    }
 }