<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller {
    public function __construct(){}

    public function index(){
        return Article::all();
    } 

    public function show($id){
        try {
            return Article::findOrFail($id);
        } catch(ModelNotFoundException $ex){
            return response()->json([
                'error' => 'Article not found!'
            ], 404);
        }
    }

    public function store(Request $request){
        $article = new Article;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->article = $request->article;

        $article->save();

        return response()->json(["message" => "Article successfully saved"]);
    }

    public function update(Request $request, $id){
        try {
            $article = Article::findOrFail($id);
            
            $article->title = $request->title;
            $article->author = $request->author;
            $article->article = $request->article;

            $article->save();

            return response()->json(["message" => "Article successfully updated"]);
        } catch(ModelNotFoundException $ex){
            return response()->json([
                'error' => 'Article not found!'
            ], 404);
        }
    }

    public function remove($id){
        try {
            $article = Article::findOrFail($id);
            
            $article->delete();

            return response()->json(["message" => "Article successfully deleted"]);
        } catch(ModelNotFoundException $ex){
            return response()->json([
                'error' => 'Article not found!'
            ], 404);
        }
    }
}
