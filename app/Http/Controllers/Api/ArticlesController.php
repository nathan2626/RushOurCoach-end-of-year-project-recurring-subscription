<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {

//        if(!auth()->user()){
//            return response()->json([
//                'error'=> "Vous n'êtes pas co"
//            ], 401);
//        }

        $current_date_time = Carbon::now();

        $articlesUser = Article::where([
            ['published', '=', '1'],
            ['date_of_publication', '<', $current_date_time],
        ])->orderByDesc('updated_at')->paginate(3);

        return response()->json([
            'articles'=>$articlesUser
        ], 201);

    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => "required",
            'title' => "required",
            'body' => "required",
            'published' => "required",
            'date_of_publication' => "required"
        ]);

        if(!$request->user()->tokenCan('articles:write')) {
            return response()->json(['message'=> 'You dont have the ability to do that.'], 401);
        }

        $params = [
            'body' => $request->get('body'),
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'published' => $request->get('published'),
            'date_of_publication' => $request->get('date_of_publication'),
        ];

        $article = Article::create([
            'body' => $params['body'],
            'title' => $params['title'],
            'image' => $params['image'],
            'published' => $params['published'],
            'date_of_publication' => $params['date_of_publication']
        ]);
        $article->save();
        return response()->json(['message'=>"L'article à bien été créée.", 'article' => $article], 201);
    }

    public function show(Request $request, $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return response()->json(["message" => "L'article' n'existe pas"],404);
        }

        return response()->json(['article' => $article], 200);

    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return response()->json(["message" => "L'article n'existe pas"], 404);
        }

        $request->validate([
            'image' => "required",
            'title' => "required",
            'body' => "required",
            'published' => "required",
            'date_of_publication' => "required"
        ]);

        $params = [
            'body' => $request->get('body'),
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'published' => $request->get('published'),
            'date_of_publication' => $request->get('date_of_publication'),
        ];


        $article = Article::where('id', $id)->update([
            'body' => $params['body'],
            'title' => $params['title'],
            'image' => $params['image'],
            'published' => $params['published'],
            'date_of_publication' => $params['date_of_publication']
        ]);

        return response()->json(['message'=>"L'article à été modifiée.", 'article' => $article], 201);

    }

    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return response()->json(["message" => "L'article n'existe pas"], 404);
        }

        $article = Article::where('id', $id)->delete();

        return response()->json(["message"=>"Article supprimée", 'article'=> $article], 200);

    }
}
